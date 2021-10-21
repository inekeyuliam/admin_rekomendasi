<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KotaKabupaten;
use App\Wisata;
use App\TipeWisata;
use App\Kriteria;
use App\ReviewWisata;
use App\DetailKriteriaWisata;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Traits\PaginationTrait;

class RekomendasiWisataController extends Controller
{
  use PaginationTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ambilhasil(Request $request) 
    {
      
      $arr = array();
      $resultbaru = array();

      $result = json_decode($request->data);
      // dd($result);

      foreach ($result as $key=>$value) {
        $id_kriteria[] = [$value->id];
      }
      foreach ($result as $key=>$value) {
        $idkriteria[] = $value->id;
      }
      foreach ($result as $key=>$value) {
        $resultbaru[] = [
          "id"=>$value->id,
          "tipe_kriteria"=>$value->tipe_kriteria,
          "bobot"=>$value->bobot,
        ];
      }
          // dd($resultbaru);

      $arrid = array_flatten($id_kriteria);
      $nilaikriteria = DB::table('kriteria_wisatas')
      ->join('wisatas','kriteria_wisatas.wisata_id','=','wisatas.id')
      ->join('kriterias','kriteria_wisatas.kriteria_id','=','kriterias.id')
      ->whereIn('kriteria_id',$arrid)
      ->get();
          // dd($arrid);
      $akarkdrt = DB::table('kriteria_wisatas')
          ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
          ->whereIn('kriteria_id',$arrid)
          ->groupby('kriteria_id')
          ->get();
      
          // dd($akarkdrt);

      $total = array();
      $normalisasi= array();
      $hasil= array();
      $kriteria= array();
      $i = 1;
      $idtipekriteria = DB::table('kriterias')
      ->select('id', 'tipe_kriteria')
      ->where("jenis_kriteria_id",1)
      ->get();

      $idtipekriteria = $idtipekriteria->toArray();
      foreach ($idtipekriteria as $key=>$value) {
        $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
        $i++;
        }
      $i=1;
      $count = count($result);
      $count = $count+1;
      $jumwisata = DB::table('wisatas')->count();


      //////////////////////////////////// NORMALISASI MATRIKS KEPUTUSAN //////////////////////////////////// 

        foreach ($akarkdrt as $idkrit) {
          $id = $idkrit->kriteria_id;
          foreach ($nilaikriteria as $idakarkrit) {
            $id2 = $idakarkrit->kriteria_id;
            $tipeid = $idakarkrit->tipe_kriteria;
            if($id == $id2)
            {
              $nilai=$idakarkrit->nilai;
              $jumlah=$idkrit->akarkuadrat;
              // $normalisasi[] = $nilai/$jumlah;
              $normalisasi[] = ['id'=>$id, 'tipe_kriteria'=>$tipeid, 'norm'=>$nilai/$jumlah];
            }
          }
        }
        // dd($normalisasi);

      //////////////////////////////////// PERKALIAN BOBOT DENGAN NILAI NORMALISASI //////////////////////////////////// 
    
        for($x=0; $x<count($normalisasi); $x++)
        {
          $ids = $normalisasi[$x]['id'];
          $tipes = $normalisasi[$x]['tipe_kriteria'];
          $hsil = $normalisasi[$x]['norm'];
          for($y=0; $y<count($resultbaru); $y++)
          {
            $ids2 = $resultbaru[$y]['id'];
            if($ids == $ids2)
            {
              $hasil[] = 
              [
                'id' => $ids,
                'tipe_kriteria' => $tipes,
                'hasil' =>  $hsil*$resultbaru[$y]['bobot']
              ];
            }

          }
       
        }
    
        $result = array();
        $arraybenefit = array();      
        $arraycost = array();

        foreach ($hasil as $element) {
            if($element['id'] && $element['tipe_kriteria'] == 'Benefit')
            {
              $arraybenefit[$element['id']][]= $element['hasil'];
            }
        }
      
        foreach ($hasil as $element) {
          if($element['id'] && $element['tipe_kriteria'] == 'Cost')
          {
            $arraycost[$element['id']][]= $element['hasil'];
          }
        }

      //////////////////////////////////// SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $costpositif=[];
        $benefitpositif = [];
        $costnegatif=[];
        $benefitnegatif = [];
        foreach($arraycost as $key=>$value){
          $costpositif[]= [
                'id' => $key,
                'hasil' => min($value)
              ];
        }
        foreach($arraybenefit as $key=>$value){
          $benefitpositif[]= [
            'id' => $key,
            'hasil' => max($value)
          ];
        }
    
        $solusipositif = array_merge($costpositif, $benefitpositif);
        usort($solusipositif, function($a, $b) {
          return $a['id'] - $b['id'];
        });

      ////////////////////////////////////  SOLUSI IDEAL NEGATIF //////////////////////////////////// 

        foreach($arraycost as $key=>$value){
          $costnegatif[]= [
                'id' => $key,
                'hasil' => max($value)
              ];
        }
        foreach($arraybenefit as $key=>$value){
          $benefitnegatif[]= [
            'id' => $key,
            'hasil' => min($value)
          ];
        }
        $solusinegatif = array_merge($costnegatif, $benefitnegatif);
        usort($solusinegatif, function($a, $b) {
          return $a['id'] - $b['id'];
        });

      //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $sum=0;
        $akar=0;
        $countkriteria = $count-1;
        $arrakarpositif = [];
        $arrsolusipositif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusipositif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusipositif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
        $bagiarraypos = array_chunk($arrsolusipositif,$jumwisata);
        $sum=[];
        foreach($bagiarraypos as $key=>$value){
          foreach($value as $id => $val){
              if(!array_key_exists($id, $sum)){
                  $sum[$id] = 0;
              }
              $sum[$id] += $val['hasil'];  
          }
        }
        foreach($sum as $key=>$val)
        {
          $arrakarpositif[] = sqrt($val);
        }
  
      //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL NEGATIF //////////////////////////////////// 
        $arrsolusinegatif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusinegatif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusinegatif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
        $arrakarnegatif = [];
        $bagiarrayneg = array_chunk($arrsolusinegatif,$jumwisata);
        $sum=[];
        foreach($bagiarrayneg as $key=>$value){
          foreach($value as $id => $val){
              if(!array_key_exists($id, $sum)){
                  $sum[$id] = 0;
              }
              $sum[$id] += $val['hasil'];  
          }
        }
        foreach($sum as $key=>$val)
        {
          $arrakarnegatif[] = sqrt($val);
        }
      //////////////////////////////////// NILAI PREFERENSI ALTERNATIF //////////////////////////////////// 
      
      $nilaipref = array_map(function($x, $y) { return $x/($x + $y); },
                   $arrakarnegatif, $arrakarpositif);

      //////////////////////////////////// SORT NILAI PREFERENSI ////////////////////////////////////    
      // dd($nilaipref[0]);
      $wisata =Wisata::with('gambar_wisatas')->get();
     
      $result = [];
      $rank = 1;
      // dd($wisata);

      foreach ($wisata as $key => $w) {
        $result[$key]['id'] = $w->id;
        $result[$key]['nama'] = $w->nama_wisata;
        $result[$key]['rating'] = $w->rating;
        $result[$key]['alamat'] = $w->alamat;
        $result[$key]['jam_buka'] = $w->jam_buka;
        $result[$key]['jam_tutup'] = $w->jam_tutup;
        $result[$key]['pref'] = $nilaipref[$key];
        foreach($w->gambar_wisatas as $gambar)
        {
          if($gambar->wisata_id == $w->id)
          {
            $result[$key]['filename'] = $gambar->filename;
          }
          else
          {
            break;
          }
        }
      }
      $result = collect($result);
      $users = $result->sortByDesc('pref')->toArray();
      $sorted = $this->paginate($users, 3); // 3 data per page.
      $kriteriadipilih = DB::table('kriterias')
      ->whereIn('id', $idkriteria)->get();
      return view('user_wisata.hasil',['ranking'=>$sorted, 'kritwis'=>$kriteriadipilih]);
    }
 

    public function lihatperhitungan(Request $request) 
    {
      
      $arr = array();
      $resultbaru = array();

      $result = json_decode($request->data);
      // dd($result);

      foreach ($result as $key=>$value) {
        $id_kriteria[] = [$value->id];
      }
      foreach ($result as $key=>$value) {
        $idkriteria[] = $value->id;
      }
      foreach ($result as $key=>$value) {
        $resultbaru[] = [
          "id"=>$value->id,
          "tipe_kriteria"=>$value->tipe_kriteria,
          "bobot"=>$value->bobot,
        ];
      }
          // dd($idkriteria);
      // $object = (object) $normalisasi;
        // dd($object);
      $arrid = array_flatten($id_kriteria);
      // dd($arrid);
      $nilaikriteria = DB::table('kriteria_wisatas')
      ->join('wisatas','kriteria_wisatas.wisata_id','=','wisatas.id')
      ->join('kriterias','kriteria_wisatas.kriteria_id','=','kriterias.id')
      ->whereIn('kriteria_id',$arrid)
      ->get();
          // dd($arrid);
      $akarkdrt = DB::table('kriteria_wisatas')
          ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
          ->whereIn('kriteria_id',$arrid)
          ->groupby('kriteria_id')
          ->get();
      
          // dd($akarkdrt);

      $total = array();
      $normalisasi= array();
      $hasil= array();
      $kriteria= array();
      $i = 1;
      $idtipekriteria = DB::table('kriterias')
      ->select('id', 'tipe_kriteria')
      ->where("jenis_kriteria_id",1)
      ->get();

      $idtipekriteria = $idtipekriteria->toArray();
      foreach ($idtipekriteria as $key=>$value) {
        $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
        $i++;
        }
      $i=1;
      $count = count($result);
      $count = $count+1;
      $jumwisata = DB::table('wisatas')->count();


      //////////////////////////////////// NORMALISASI MATRIKS KEPUTUSAN //////////////////////////////////// 

        foreach ($akarkdrt as $idkrit) {
          $id = $idkrit->kriteria_id;
          foreach ($nilaikriteria as $idakarkrit) {
            $id2 = $idakarkrit->kriteria_id;
            $tipeid = $idakarkrit->tipe_kriteria;
            if($id == $id2)
            {
              $nilai=$idakarkrit->nilai;
              $jumlah=$idkrit->akarkuadrat;
              // $normalisasi[] = $nilai/$jumlah;
              $normalisasi[] = ['id'=>$id, 'tipe_kriteria'=>$tipeid, 'norm'=>round($nilai/$jumlah, 4)];
            }
          }
        }
      
        // dd($normalisasi);
        // dd($normalisasi);
        // $object = (object) $normalisasi;
        // dd($object);
      //////////////////////////////////// PERKALIAN BOBOT DENGAN NILAI NORMALISASI //////////////////////////////////// 
    
        for($x=0; $x<count($normalisasi); $x++)
        {
          $ids = $normalisasi[$x]['id'];
          $tipes = $normalisasi[$x]['tipe_kriteria'];
          $hsil = $normalisasi[$x]['norm'];
          for($y=0; $y<count($resultbaru); $y++)
          {
            $ids2 = $resultbaru[$y]['id'];
            if($ids == $ids2)
            {
              $hasil[] = 
              [
                'id' => $ids,
                'tipe_kriteria' => $tipes,
                'hasil' => round($hsil*$resultbaru[$y]['bobot'],4)
              ];
            }

          }
       
        }
        // dd($hasil);
        $result = array();
        $arraybenefit = array();      
        $arraycost = array();

        foreach ($hasil as $element) {
            if($element['id'] && $element['tipe_kriteria'] == 'Benefit')
            {
              $arraybenefit[$element['id']][]= $element['hasil'];
            }
        }
      
        foreach ($hasil as $element) {
          if($element['id'] && $element['tipe_kriteria'] == 'Cost')
          {
            $arraycost[$element['id']][]= $element['hasil'];
          }
        }

      //////////////////////////////////// SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $costpositif=[];
        $benefitpositif = [];
        $costnegatif=[];
        $benefitnegatif = [];
        foreach($arraycost as $key=>$value){
          $costpositif[]= [
                'id' => $key,
                'hasil' => min($value)
              ];
        }
        foreach($arraybenefit as $key=>$value){
          $benefitpositif[]= [
            'id' => $key,
            'hasil' => max($value)
          ];
        }
    
        $solusipositif = array_merge($costpositif, $benefitpositif);
        usort($solusipositif, function($a, $b) {
          return $a['id'] - $b['id'];
        });
        // dd($solusipositif);

      ////////////////////////////////////  SOLUSI IDEAL NEGATIF //////////////////////////////////// 

        foreach($arraycost as $key=>$value){
          $costnegatif[]= [
                'id' => $key,
                'hasil' => max($value)
              ];
        }
        foreach($arraybenefit as $key=>$value){
          $benefitnegatif[]= [
            'id' => $key,
            'hasil' => min($value)
          ];
        }
        $solusinegatif = array_merge($costnegatif, $benefitnegatif);
        usort($solusinegatif, function($a, $b) {
          return $a['id'] - $b['id'];
        });

      //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL POSITIF //////////////////////////////////// 
        $sum=0;
        $akar=0;
        $countkriteria = $count-1;
        $arrakarpositif = [];
        $arrsolusipositif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusipositif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusipositif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
        $bagiarraypos = array_chunk($arrsolusipositif,$jumwisata);
        $sum=[];
        foreach($bagiarraypos as $key=>$value){
          foreach($value as $id => $val){
              if(!array_key_exists($id, $sum)){
                  $sum[$id] = 0;
              }
              $sum[$id] += $val['hasil'];  
          }
        }
        foreach($sum as $key=>$val)
        {
          $arrakarpositif[] = round(sqrt($val),4);
        }
        // dd($arrakarpositif);
      //////////////////////////////////// JARAK ALTERNATIF DENGAN SOLUSI IDEAL NEGATIF //////////////////////////////////// 
        $arrsolusinegatif = [];
        foreach($hasil as $key=>$value){
          $id1 = $value['id'];
          $hasil1 = $value['hasil'];
          foreach($solusinegatif as $key2 => $value2)
          {
            $id2 = $value2['id'];
            $hasil2 = $value2['hasil'];
            if($id1 == $id2)
            {
              $arrsolusinegatif[]=[
                'id' => $id1,
                'hasil' => POW(($hasil1-$hasil2),2)
              ];
            }
          }
        }
        $arrakarnegatif = [];
        $bagiarrayneg = array_chunk($arrsolusinegatif,$jumwisata);
        $sum=[];
        foreach($bagiarrayneg as $key=>$value){
          foreach($value as $id => $val){
              if(!array_key_exists($id, $sum)){
                  $sum[$id] = 0;
              }
              $sum[$id] += $val['hasil'];  
          }
        }
        foreach($sum as $key=>$val)
        {
          $arrakarnegatif[] = round(sqrt($val),4);
        }
      //////////////////////////////////// NILAI PREFERENSI ALTERNATIF //////////////////////////////////// 
      
      $nilaipref = array_map(function($x, $y) { return $x/($x + $y); },
                   $arrakarnegatif, $arrakarpositif);

      //////////////////////////////////// SORT NILAI PREFERENSI ////////////////////////////////////    
      // dd($nilaipref);
      $wisata =Wisata::with('gambar_wisatas')->get();
     
      $result = [];
      $rank = 1;
      // dd($wisata);

      foreach ($wisata as $key => $w) {
        $result[$key]['id'] = $w->id;
        $result[$key]['nama'] = $w->nama_wisata;
        $result[$key]['rating'] = $w->rating;
        $result[$key]['alamat'] = $w->alamat;
        $result[$key]['jam_buka'] = $w->jam_buka;
        $result[$key]['jam_tutup'] = $w->jam_tutup;
        $result[$key]['pref'] = $nilaipref[$key];
        foreach($w->gambar_wisatas as $gambar)
        {
          if($gambar->wisata_id == $w->id)
          {
            $result[$key]['filename'] = $gambar->filename;
          }
          else
          {
            break;
          }
        }
      }
      $result = collect($result);
      $sorted = $result->sortByDesc('pref')->toArray();
      // $sorted = $this->paginate($users, 3); // 3 data per page.
      $kriteriadipilih = DB::table('kriterias')
      ->whereIn('id', $idkriteria)->get();
      return view('user_wisata.perhitungan',['nilaipref'=>$nilaipref,'wisata'=>$wisata,'arrakarpos'=>$arrakarpositif,'arrakarneg'=>$arrakarnegatif,'solusineg' => $solusinegatif,'solusipos' => $solusipositif,'terboboti'=>$hasil,'id'=>$idkriteria,'normalisasi'=>$normalisasi, 'resultahp'=>$result,'ranking'=>$sorted, 'kritwis'=>$kriteriadipilih]);
    
    }


    public function form()
    {
        $allkriteria = DB::table('kriterias')->where("jenis_kriteria_id",1)->get();
        $kriteria = DB::table('kriterias')->where("jenis_kriteria_id",1)->get();
        $count = DB::table('kriterias')->where("jenis_kriteria_id",1)->count();
        $nilaikriteria = DB::table('kriteria_wisatas')
        ->join('wisatas','kriteria_wisatas.wisata_id','=','wisatas.id')
        ->join('kriterias','kriteria_wisatas.kriteria_id','=','kriterias.id')
        ->get();
        $akarkdrt = DB::table('kriteria_wisatas')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();
        $cost = DB::table('kriteria_wisatas')
        ->select('kriterias.id')
        ->join('wisatas','kriteria_wisatas.wisata_id','=','wisatas.id')
        ->join('kriterias','kriteria_wisatas.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();
        $jum = DB::table('kriteria_wisatas')
        ->groupby('wisata_id')
        ->count();
        $arr = array();
        $normalisasi= array();
        foreach ($nilaikriteria as $idkrit) {
            $id = $idkrit->kriteria_id;
            foreach ($akarkdrt as $idakarkrit) {
              $id2 = $idakarkrit->kriteria_id;
              if($id == $id2)
              {
                  $nilai=$idkrit->nilai;
                  $jumlah=$idakarkrit->akarkuadrat;
                  $arr[] = $nilai/$jumlah;
              }
            }
        }
        $kabupaten = KotaKabupaten::all();
        return view('user_wisata.form', ['kabupaten'=>$kabupaten, 'allkritwis'=>$allkriteria,'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }
    

    public function result() 
    {
      $result = $_POST['data'];
      $arr = array();

      foreach($result as $row){
        $arr[] = $row;
      }
      return $arr;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // foreach($request->input('prioritas') as $key => $value) {
        //     dd($value);
        // }
        return view('user_wisata.hasil');

    }
    

    public function showWisata(Request $request)
    {
        $iddipilih = $request->get('wisata');
        $id = $request->get('idkriteria');
        $countwis = count($iddipilih);
        $kriteria = DB::table('kriterias')
        ->where('jenis_kriteria_id', 1)->get();
 
        if($countwis == 2)
        {
          $wis1 = DB::table('wisatas')->where('id', '=', $iddipilih[0])->get();
          $wis2 = DB::table('wisatas')->where('id', '=', $iddipilih[1])->get();
          $detwis1 = DB::table('detail_kriteria_wisatas')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_wisatas.detail_kriteria_id')
          ->where('detail_kriteria_wisatas.wisata_id','=',$iddipilih[0])->get();
          $detwis2 = DB::table('detail_kriteria_wisatas')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_wisatas.detail_kriteria_id')
          ->where('detail_kriteria_wisatas.wisata_id','=',$iddipilih[1])->get();
          $kriteriawis1 = DB::table('wisatas')
          ->join('kriteria_wisatas', 'kriteria_wisatas.wisata_id', '=', 'wisatas.id')            
          ->join('kriterias', 'kriteria_wisatas.wisata_id', '=', 'kriterias.id')
          ->orderBy('kriteria_wisatas.kriteria_id', 'ASC')
          ->where('wisatas.id', '=',$iddipilih[0])
          ->get();
          $kriteriawis2 = DB::table('wisatas')
          ->join('kriteria_wisatas', 'kriteria_wisatas.wisata_id', '=', 'wisatas.id')            
          ->join('kriterias', 'kriteria_wisatas.wisata_id', '=', 'kriterias.id')
          ->orderBy('kriteria_wisatas.kriteria_id', 'ASC')
          ->where('wisatas.id', '=', $iddipilih[1])
          ->get();
          $gambar1 = DB::table('gambar_wisatas')
          ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
          ->where('wisatas.id', '=', $iddipilih[0])
          ->get();
          $gambar2 = DB::table('gambar_wisatas')
          ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
          ->where('wisatas.id', '=', $iddipilih[1])
          ->get();
          return view('user_wisata.compare',['gambar1'=>$gambar1, 'gambar2' => $gambar2,'detwis1'=>$detwis1, 'detwis2' => $detwis2,'kriteria'=>$kriteria,'countwis'=>$countwis, 
          'wis1'=>$wis1 , 'wis2' =>$wis2, 'kriteriawis1'=>$kriteriawis1 , 'kriteriawis2' =>$kriteriawis2]);
        
        }
        else
        {
          $wis1 = DB::table('wisatas')->where('id', '=', $iddipilih[0])->get();
          $wis2 = DB::table('wisatas')->where('id', '=', $iddipilih[1])->get();
          $wis3 = DB::table('wisatas')->where('id', '=', $iddipilih[2])->get();
          $detwis1 = DB::table('detail_kriteria_wisatas')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_wisatas.detail_kriteria_id')
          ->where('detail_kriteria_wisatas.wisata_id','=',$iddipilih[0])->get();
          $detwis2 = DB::table('detail_kriteria_wisatas')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_wisatas.detail_kriteria_id')
          ->where('detail_kriteria_wisatas.wisata_id','=',$iddipilih[1])->get();
          $detwis3 = DB::table('detail_kriteria_wisatas')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_wisatas.detail_kriteria_id')
          ->where('detail_kriteria_wisatas.wisata_id','=',$iddipilih[2])->get();
          $kriteriawis1 = DB::table('wisatas')
          ->join('kriteria_wisatas', 'kriteria_wisatas.wisata_id', '=', 'wisatas.id')            
          ->join('kriterias', 'kriteria_wisatas.wisata_id', '=', 'kriterias.id')          
          ->orderBy('kriteria_wisatas.kriteria_id', 'ASC')
          ->where('wisatas.id', '=',$iddipilih[0])
          ->get();
          $kriteriawis2 = DB::table('wisatas')
          ->join('kriteria_wisatas', 'kriteria_wisatas.wisata_id', '=', 'wisatas.id')            
          ->join('kriterias', 'kriteria_wisatas.wisata_id', '=', 'kriterias.id')
          ->orderBy('kriteria_wisatas.kriteria_id', 'ASC')
          ->where('wisatas.id', '=', $iddipilih[1])
          ->get();
          $kriteriawis3 = DB::table('wisatas')
          ->join('kriteria_wisatas', 'kriteria_wisatas.wisata_id', '=', 'wisatas.id')            
          ->join('kriterias', 'kriteria_wisatas.wisata_id', '=', 'kriterias.id')
          ->orderBy('kriteria_wisatas.kriteria_id', 'ASC')
          ->where('wisatas.id', '=', $iddipilih[2])
          ->get();
          $gambar1 = DB::table('gambar_wisatas')
          ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
          ->where('wisatas.id', '=', $iddipilih[0])
          ->get();
          $gambar2 = DB::table('gambar_wisatas')
          ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
          ->where('wisatas.id', '=', $iddipilih[1])
          ->get();
          $gambar3 = DB::table('gambar_wisatas')
          ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
          ->where('wisatas.id', '=', $iddipilih[2])
          ->get();
          return view('user_wisata.compare',['gambar1'=>$gambar1, 'gambar2' => $gambar2,'gambar3' =>$gambar3,'detwis1'=>$detwis1, 'detwis2' => $detwis2,'detwis3' =>$detwis3,
          'kriteria'=>$kriteria,'countwis'=>$countwis,'wis1'=>$wis1 , 'wis2' =>$wis2, 'wis3' =>$wis3,  
          'kriteriawis1'=>$kriteriawis1 , 'kriteriawis2' =>$kriteriawis2, 'kriteriawis3' =>$kriteriawis3]);
        
        }        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('user_wisata.hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $wis = Wisata::find($id);
      $gambarwisata = DB::table('gambar_wisatas')
      ->join('wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)->orderBy('gambar_wisatas.id','DESC')
      ->get();
      $hargawisata = DB::table('harga_wisatas')
      ->join('wisatas', 'harga_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)
      ->get();
      $reviewwisata = DB::table('review_wisatas')
      ->join('wisatas', 'review_wisatas.wisata_id','=','wisatas.id')
      ->where('wisatas.id','=',$wis->id)
      ->get();
      $fasiwisata = DB::table('detail_kriteria_wisatas')
      ->join('wisatas', 'detail_kriteria_wisatas.wisata_id','=','wisatas.id')
      ->join('detail_kriterias','detail_kriteria_wisatas.detail_kriteria_id','=','detail_kriterias.id')
      ->where('wisatas.id','=',$wis->id)
      ->get();
      return view('user_wisata.show',['list' => $wis, 'fasilitas' => $fasiwisata,
      'gambar' => $gambarwisata, 'harga' => $hargawisata, 'review' => $reviewwisata]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nama = $request->get('name');
      $rate = $request->get('rate');
      $review = $request->get('review');

      $rev = new ReviewWisata();
      $rev->wisata_id = $id;
      $rev->nama = $nama;
      $rev->rate = $rate;
      $rev->review = $review;
      $rev->save();
      // dd($rev);
      return redirect('detailwisata/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftar()
    {

      $wisata = Wisata::with('gambar_wisatas')->whereHas('kelurahans.kecamatans.kabupatens',
      function ($q){
          $q->select('*');
      })->simplePaginate(3);
      $tipewis = DB::table('tipe_wisatas')->get();
      $detailwisata = DB::table('detail_kriterias')->where('kriteria_id',1)->get();
      return view('user_wisata.daftar',['wisata'=>$wisata, 'tipewis'=>$tipewis, 'detail'=>$detailwisata]);
    }

    public function filter(Request $request)
    {
      $tipe_id = $request->get('tipe_wisata');
      $kota = $request->get('kota');
      $rate_ = $request->get('rate');
      $min = $request->get('mintiket');
      $max = $request->get('maxtiket');
      $waktu = $request->get('waktu');
      $fasi = $request->get('fasi');

      $kabupaten = KotaKabupaten::all();
      $wisata = Wisata::with(['kelurahans.kecamatans.kabupatens','gambar_wisatas','detail_kriteria_wisatas'])->whereHas('tipe_wisatas',
      function ($q) use($fasi,$tipe_id,$kota,$rate_,$min,$max,$waktu){

        //semua dipilih
        if(!empty($tipe_id) && !empty($fasi) &&  !empty($rate_) && !empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)->whereIn('detail_kriteria_wisatas.detail_kriteria_id',$fasi)
            ->whereBetween('wisatas.harga_masuk', [$min, $max])->where('wisatas.jam_buka','>=','08:00')->where('wisatas.rating','>=',(float)$rate_);
          }
          else
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)->whereIn('detail_kriteria_wisatas.detail_kriteria_id',$fasi)
            ->whereBetween('wisatas.harga_masuk', [$min, $max])->where('wisatas.jam_buka','>=','15:00')->where('wisatas.rating','>=',(float)$rate_);
          }
        }

        //jika satu tidak diisi
        else if(empty($tipe_id) && !empty($rate_) && !empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('kabupatens.id',$kota)
          ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00')->where('wisatas.rating','>=',(float)$rate_);
          }
          else
          {
            $q->whereIn('kabupatens.id',$kota)
            ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00')->where('wisatas.rating','>=',(float)$rate_);
          }
        }
        else if(!empty($tipe_id) && empty($rate_) && !empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)
          ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00');
          }
          else
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)
            ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00');
          }
        }
        else if(!empty($tipe_id) && !empty($rate_) && empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)
          ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00')->where('wisatas.rating','>=',(float)$rate_);
          }
          else
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)
            ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00')->where('wisatas.rating','>=',(float)$rate_);
          }
        }
        else if(!empty($tipe_id) && !empty($rate_) && !empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
         
          $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)
          ->whereBetween('harga_masuk', [$min, $max])->where('wisatas.rating','>=',(float)$rate_);
        }

        //jika dua tidak diisi
        else if(empty($tipe_id) && empty($rate_) && !empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('kabupatens.id',$kota)
          ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00');
          }
          else
          {
            $q->whereIn('kabupatens.id',$kota)
            ->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00');
          }
        }
        else if(empty($tipe_id) && !empty($rate_) && empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00')->where('wisatas.rating','>=',(float)$rate_);
          }
          else
          {
            $q->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00')->where('wisatas.rating','>=',(float)$rate_);
          }
        }
        else if(empty($tipe_id) && !empty($rate_) && !empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
          $q->whereIn('kabupatens.id',$kota)->whereBetween('harga_masuk', [$min, $max])->where('wisatas.rating','>=',(float)$rate_);
        }
        else if(!empty($tipe_id) && empty($rate_) && empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00');
          }
          else
          {
            $q->whereIn('tipe_wisatas.id', $tipe_id)->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00');
          }
        }
        else if(!empty($tipe_id) && empty($rate_) && !empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
          $q->whereIn('tipe_wisatas.id', $tipe_id)->whereIn('kabupatens.id',$kota)->whereBetween('harga_masuk', [$min, $max]);
        }
        else if(!empty($tipe_id) && !empty($rate_) && empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
          $q->whereIn('tipe_wisatas.id', $tipe_id)->whereBetween('harga_masuk', [$min, $max])->where('wisatas.rating','>=',(float)$rate_);
        }

        //jika tiga tidak diisi
        else if(empty($tipe_id) && empty($rate_) && empty($kota) && !empty($waktu) && !empty($min) && !empty($max))
        {
          if($waktu==1)
          {
            $q->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','08:00');
          }
          else
          {
            $q->whereBetween('harga_masuk', [$min, $max])->where('jam_buka','>=','15:00');
          }
        }
        else if(empty($tipe_id) && empty($rate_) && !empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
        
          $q->whereIn('kabupatens.id',$kota)->whereBetween('harga_masuk', [$min, $max]);
         
        }
        else if(empty($tipe_id) && !empty($rate_) && empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
          
          $q->whereBetween('harga_masuk', [$min, $max])->where('wisatas.rating','>=',(float)$rate_);
         
        }
        else if(!empty($tipe_id) && empty($rate_) && empty($kota) && empty($waktu) && !empty($min) && !empty($max))
        {
          $q->whereIn('tipe_wisatas.id', $tipe_id)->whereBetween('harga_masuk', [$min, $max]);
        }
        else
        {
          $q->whereBetween('harga_masuk', [$min, $max]);
        }
      })->simplePaginate(9);

      $tipewis = DB::table('tipe_wisatas')->get();
      return view('user_wisata.daftar',['wisata'=>$wisata, 'tipewis'=>$tipewis]);
    }

    public function index()
    {
      
      // $output_data = shell_exec('python scrape_instagram.py');

      // // $output_data = shell_exec('python Users/inekeyuliamargareta/Downloads/scrape_instagram.py');
      // dd($output_data);

      return view('user_wisata.index');  
    }
    
    public function kriteria(Request $request)
    {
      $allkriteria = DB::table('kriterias')->where("jenis_kriteria_id",1)->get();
      $id = $request->get('kriteria');
      if(count($id) < 3)
      {
        return \Redirect::back()->withErrors(['msg' => 'Kriteria Kurang Dari 3! Mohon Masukan Kembali Minimal 3 Kriteria']);
      }
      else
      {
        $kriteria = DB::table('kriterias')
        ->whereIn('id', $id)->get();
        $count =DB::table('kriterias')
        ->whereIn('id', $id)->count();
        $cost = DB::table('kriteria_wisatas')
        ->select('kriterias.id')
        ->join('wisatas','kriteria_wisatas.wisata_id','=','wisatas.id')
        ->join('kriterias','kriteria_wisatas.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();
        return view('user_wisata.store', ['allkritwis'=>$allkriteria,  'idkritwis'=>$id, 
        'kritwis'=>$kriteria,'count'=>$count,'cost'=>$cost]);
      }
    }

    public function filterlokasi(Request $request)
    {
      $kota = $request->get('kota');
      $kabupaten = KotaKabupaten::all();
      $tipewis = DB::table('tipe_wisatas')->get();
      $wisata = Wisata::with('gambar_wisatas')->whereHas('kelurahans.kecamatans.kabupatens',
      function ($q) use($kota){
          $q->whereIn('kabupatens.id',$kota);
      })->get();
      return view('user_wisata.daftar',['wisata'=>$wisata, 'tipewis'=>$tipewis,'kota'=>$kabupaten]);
    }

    public function hargawisata(Request $request)
    {
      $min = $request->get('mintiket');
      $max = $request->get('maxtiket');
      $tipewis = DB::table('tipe_wisatas')->get();
      $wisata = Wisata::with('gambar_wisatas')->whereHas('harga_wisatas',
      function ($q) use($min, $max){
          $q->whereBetween('harga_masuk', [$min, $max]);
      })->get();
      return view('user_wisata.daftar',['wisata'=>$wisata, 'tipewis'=>$tipewis]);
    }


    public function filterwaktu(Request $request)
    {
      $waktu = $request->get('waktu');
      $tipewis = DB::table('tipe_wisatas')->get();
      $wisata = Wisata::with('gambar_wisatas')->whereHas('harga_wisatas',
      function ($q) use($waktu){
        if($waktu==1)
        {
          $q->where('jam_buka','>=','08:00');
        }
        else
        {
          $q->where('jam_buka','>=','15:00');
        }
      })->get();
      return view('user_wisata.daftar',['wisata'=>$wisata, 'tipewis'=>$tipewis]);
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('kabupatens')
         ->where('nama_kabupaten', 'like', '%'.$query.'%')
         ->get();

      }
      else
      {
       $data = DB::table('kabupatens')
        ->get();
      }

      echo json_encode($data);
     }
    }
    public function aboutme()
    {
      return view('about');
    }
}
