<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\KotaKabupaten;
use App\Kendaraan;
use App\Persewaan;
use App\ReviewPersewaan;
use App\DetailKriteriaPersewaan;

class RekomendasiPersewaanController extends Controller
{
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
      $arrid = array_flatten($id_kriteria);
      // dd($resultbaru);
      $nilaikriteria = DB::table('kriteria_persewaans')
      ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
      ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
      ->whereIn('kriteria_id',$arrid)
      ->get();
      // dd($nilaikriteria);
      $akarkdrt = DB::table('kriteria_persewaans')
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
      ->where("jenis_kriteria_id",3)
      ->get();

      $idtipekriteria = $idtipekriteria->toArray();
      foreach ($idtipekriteria as $key=>$value) {
        $kriteria[$key] = ['id'=>$i, 'tipe_kriteria'=>$value->tipe_kriteria];
        $i++;
      }
      $i=1;
      $count = count($result);
      $count = $count+1;
      $jumpersewaan = DB::table('persewaans')->count();


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

      // foreach ($normalisasi as $norm) {
      //   // $norm = $hasilnorm['norm'];
      //   foreach($result as $res)
      //   {
      //     $ids = $res->id;
      //     $tipes = $res->tipe_kriteria;
      //     $hsil = $res->bobot;
      //     $total[] = 
      //     [
      //       'id' => $ids,
      //       'tipe_kriteria' => $tipes,
      //       'totalhasil' => $norm * $hsil
      //     ];
      //     // dd($total);
      //     foreach($total as $key=>$value)
      //     {
      //       $hasil[$key] = 
      //       [
      //         'id'=>$value['id'],
      //         'tipe_kriteria' => $value['tipe_kriteria'],
      //         'hasil'=>$value['totalhasil']
      //       ];
      //     }
      //   }
      // }
      $result = array();
      $arraybenefit = array();      
      $arraycost = array();

      // foreach($kriteria as $ben)
      // {
      //   foreach ($hasil as $element) {
      //   $result[$element['id']][] = $element['hasil'];
      //     if($ben['id'] == $element['id'] && $ben['tipe_kriteria'] == 'Benefit')
      //     {
      //       $arraybenefit[$element['id']][]= $element['hasil'];
      //     }
      //   }
      // }

      foreach ($hasil as $element) {
          // $result[$element['id']][] = $element['hasil'];
          if($element['id'] && $element['tipe_kriteria'] == 'Benefit')
          {
            $arraybenefit[$element['id']][]= $element['hasil'];

            // $arraybenefit[]= ["id" => $element['id'], "tipe_kriteria" => $element['tipe_kriteria'], "hasil"=>$element['hasil']];
          }
      }
      // dd($arraybenefit);
      // foreach($kriteria as $cost)
      // {
      //   foreach ($hasil as $element) {
      //   $result[$element['id']][] = $element['hasil'];
      //     if($cost['id'] == $element['id'] && $cost['tipe_kriteria'] == 'Cost')
      //     {
      //       $arraycost[$element['id']][]= $element['hasil'];
      //     }
      //   }
      // }  

      foreach ($hasil as $element) {
        // $result[$element['id']][] = $element['hasil'];
        if($element['id'] && $element['tipe_kriteria'] == 'Cost')
        {
          $arraycost[$element['id']][]= $element['hasil'];

          // $arraycost[]=["id" => $element['id'], "tipe_kriteria" => $element['tipe_kriteria'], "hasil" => $element['hasil']];
        }
      }
      // dd($arraycost);
      //////////////////////////////////// SOLUSI IDEAL POSITIF //////////////////////////////////// 
      $costpositif=[];
      $benefitpositif = [];
      $costnegatif=[];
      $benefitnegatif = [];
      // $numberscost = array_column($arraycost, 'hasil');
      // $numbersbef = array_column($arraybenefit, 'hasil');
      foreach($arraycost as $key=>$value){
        $costpositif[]= [
              'id' => $key,
              'hasil' => min($value)
            ];
      }
      // dd($costnegatif);
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
      // dd($solusinegatif);

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
      $bagiarraypos = array_chunk($arrsolusipositif,$jumpersewaan);
      // dd($bagiarraypos);
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
      $bagiarrayneg = array_chunk($arrsolusinegatif,$jumpersewaan);
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
      // dd($arrakarnegatif);
      //////////////////////////////////// NILAI PREFERENSI ALTERNATIF //////////////////////////////////// 
      
      $nilaipref = array_map(function($x, $y) { return $x/($x + $y); },
                  $arrakarnegatif, $arrakarpositif);

      //////////////////////////////////// SORT NILAI PREFERENSI ////////////////////////////////////
      // dd($nilaipref);
    
    
      $persewaan =Persewaan::with('gambar_persewaans')->get();
      $result = [];
      $rank = 1;

      foreach ($persewaan as $key => $w) {

        $result[$key]['id'] = $w->id;
        $result[$key]['nama'] = $w->nama_persewaan;
        $result[$key]['rating'] = $w->rating;
        $result[$key]['alamat'] = $w->alamat;
        $result[$key]['jam_buka'] = $w->jam_buka;
        $result[$key]['jam_tutup'] = $w->jam_tutup;
        $result[$key]['filename'] = $w->filename;
        $result[$key]['pref'] = $nilaipref[$key];
        foreach($w->gambar_persewaans as $gambar)
        {
          if($gambar->persewaan_id == $w->id)
          {
            $result[$key]['filename'] = $gambar->filename;
          }
          else
          {
            break;
          }
        }
        // $result[$key]['rank'] = $rank;
        // $rank++;

      }
      $result = collect($result);
      $sorted = $result->sortByDesc('pref')->toArray();
      // dd($sorted);
      $kriteriadipilih = DB::table('kriterias')
      ->whereIn('id', $idkriteria)->get();
      // dd($sorted);
      return view('user_persewaan.hasil',['ranking'=>$sorted, 'kritwis'=>$kriteriadipilih]);
    
    }
    public function form()
    {
        $allkriteria = DB::table('kriterias')->where("jenis_kriteria_id",3)->get();
        $kriteria = DB::table('kriterias')->where("jenis_kriteria_id",3)->get();
        $count = DB::table('kriterias')->where("jenis_kriteria_id",3)->count();
        $nilaikriteria = DB::table('kriteria_persewaans')
        ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->get();

        $akarkdrt = DB::table('kriteria_persewaans')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();

        $cost = DB::table('kriteria_persewaans')
        ->select('kriterias.id')
        ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();

        $jum = DB::table('kriteria_persewaans')
        ->groupby('persewaan_id')
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
        // dd(array_chunk($arr, $count, true));
        $kabupaten = KotaKabupaten::all();
        return view('user_persewaan.form', ['kabupaten'=>$kabupaten, 'allkritwis'=>$allkriteria,'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }
      public function index()
    {
        $kriteria = DB::table('kriterias')->where("jenis_kriteria_id",3)->get();
        $count = DB::table('kriterias')->where("jenis_kriteria_id",3)->count();
        $nilaikriteria = DB::table('kriteria_persewaans')
        ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->get();

        $akarkdrt = DB::table('kriteria_persewaans')
        ->select(DB::raw('kriteria_id, SQRT(SUM(POW(nilai,2))) as akarkuadrat'))
        ->groupby('kriteria_id')
        ->get();

        $cost = DB::table('kriteria_persewaans')
        ->select('kriterias.id')
        ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();

        $jum = DB::table('kriteria_persewaans')
        ->groupby('persewaan_id')
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
        // dd(array_chunk($arr, $count, true));
        $kabupaten = Kabupaten::all();
        return view('user_persewaan.index', ['kabupaten'=>$kabupaten, 'kritwis'=>$kriteria,'count'=>$count, 'nilai' =>$arr,'cost'=>$cost]);  
    }
    public function show($id)
    {
      $sewa = Persewaan::find($id);

      $gambarpersewaan = DB::table('gambar_persewaans')
      ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
      ->where('persewaans.id','=',$sewa->id)->orderBy('gambar_persewaans.id','DESC')
      ->get();
      // dd($gambarpersewaan);

      $reviewsewa = DB::table('review_persewaans')
      ->join('persewaans', 'review_persewaans.persewaan_id','=','persewaans.id')
      ->where('persewaans.id','=',$sewa->id)
      ->get();

      $kendaraansewa = DB::table('kendaraans')
      ->join('persewaans', 'kendaraans.persewaan_id','=','persewaans.id')
      ->join('model_kendaraans','kendaraans.model_id','=','model_kendaraans.id')
      ->join('merk_kendaraans','model_kendaraans.merk_id','=','merk_kendaraans.id')
      ->where('persewaans.id','=',$sewa->id)
      ->get();

      $fasisewa = DB::table('detail_kriteria_persewaans')
      ->join('persewaans', 'detail_kriteria_persewaans.persewaan_id','=','persewaans.id')
      ->join('detail_kriterias','detail_kriteria_persewaans.detail_kriteria_id','=','detail_kriterias.id')
      ->where('persewaans.id','=',$sewa->id)
      ->get();
      // dd($hargapersewaan);
      return view('user_persewaan.show',['list' => $sewa, 'fasilitas' => $fasisewa,'kendaraan'=>$kendaraansewa, 'gambar' => $gambarpersewaan, 'review' => $reviewsewa]);
     
    }
    public function update(Request $request, $id)
    {
      $nama = $request->get('name');
      $rate = $request->get('rate');
      $review = $request->get('review');

      $rev = new ReviewPersewaan();
      $rev->persewaan_id = $id;
      $rev->nama = $nama;
      $rev->rate = $rate;
      $rev->review = $review;
      $rev->save();
      // dd($rev);
      return redirect('detailpersewaan/'.$id);
    }
    public function kriteria(Request $request)
    {
      $allkriteria = DB::table('kriterias')->where("jenis_kriteria_id",3)->get();
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
        $cost = DB::table('kriteria_persewaans')
        ->select('kriterias.id')
        ->join('persewaans','kriteria_persewaans.persewaan_id','=','persewaans.id')
        ->join('kriterias','kriteria_persewaans.kriteria_id','=','kriterias.id')
        ->where('kriterias.tipe_kriteria','=','Cost')
        ->groupby('kriteria_id')
        ->get();
        return view('user_persewaan.store', ['allkritwis'=>$allkriteria,  'idkritwis'=>$id, 'kritwis'=>$kriteria,'count'=>$count,'cost'=>$cost]);
      
      }      

    }
    public function daftar()
    {
      $kabupaten = KotaKabupaten::all();
      $persewaan = Persewaan::with('gambar_persewaans')->whereHas('kendaraans.model_kendaraans',
      function ($q){
        $q->where('persewaans.status','aktif');
      })->orderBy('persewaans.id')->get();
      return view('user_persewaan.daftar',['persewaan'=>$persewaan, 'kota'=>$kabupaten]);

    }
    public function showPersewaan(Request $request)
    {
        $iddipilih = $request->get('persewaan');
        $id = $request->get('idkriteria');
        $countwis = count($iddipilih);
        $kriteria = DB::table('kriterias')
        ->where('jenis_kriteria_id', 3)->get();
 
        if($countwis == 2)
        {
          $wis1 = DB::table('persewaans')->where('id', '=', $iddipilih[0])->get();
          $wis2 = DB::table('persewaans')->where('id', '=', $iddipilih[1])->get();
          $detwis1 = DB::table('detail_kriteria_persewaans')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_persewaans.detail_kriteria_id')
          ->where('detail_kriteria_persewaans.persewaan_id','=',$iddipilih[0])->get();
          $detwis2 = DB::table('detail_kriteria_persewaans')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_persewaans.detail_kriteria_id')
          ->where('detail_kriteria_persewaans.persewaan_id','=',$iddipilih[1])->get();
          $kriteriawis1 = DB::table('persewaans')
          ->join('kriteria_persewaans', 'kriteria_persewaans.persewaan_id', '=', 'persewaans.id')            
          ->join('kriterias', 'kriteria_persewaans.persewaan_id', '=', 'kriterias.id')
          ->orderBy('kriteria_persewaans.kriteria_id', 'ASC')
          ->where('persewaans.id', '=',$iddipilih[0])
          ->get();
          $kriteriawis2 = DB::table('persewaans')
          ->join('kriteria_persewaans', 'kriteria_persewaans.persewaan_id', '=', 'persewaans.id')            
          ->join('kriterias', 'kriteria_persewaans.persewaan_id', '=', 'kriterias.id')
          ->orderBy('kriteria_persewaans.kriteria_id', 'ASC')
          ->where('persewaans.id', '=', $iddipilih[1])
          ->get();
          $gambar1 = DB::table('gambar_persewaans')
          ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
          ->where('persewaans.id', '=', $iddipilih[0])
          ->get();
          $gambar2 = DB::table('gambar_persewaans')
          ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
          ->where('persewaans.id', '=', $iddipilih[1])
          ->get();

          return view('user_persewaan.compare',['gambar1'=>$gambar1, 'gambar2' => $gambar2,'detwis1'=>$detwis1, 'detwis2' => $detwis2,'kriteria'=>$kriteria,'countwis'=>$countwis, 'wis1'=>$wis1 , 'wis2' =>$wis2, 'kriteriawis1'=>$kriteriawis1 , 'kriteriawis2' =>$kriteriawis2]);
        
        }
        else
        {
          $wis1 = DB::table('persewaans')->where('id', '=', $iddipilih[0])->get();
          $wis2 = DB::table('persewaans')->where('id', '=', $iddipilih[1])->get();
          $wis3 = DB::table('persewaans')->where('id', '=', $iddipilih[2])->get();

          $detwis1 = DB::table('detail_kriteria_persewaans')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_persewaans.detail_kriteria_id')
          ->where('detail_kriteria_persewaans.persewaan_id','=',$iddipilih[0])->get();
          $detwis2 = DB::table('detail_kriteria_persewaans')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_persewaans.detail_kriteria_id')
          ->where('detail_kriteria_persewaans.persewaan_id','=',$iddipilih[1])->get();
          $detwis3 = DB::table('detail_kriteria_persewaans')
          ->join('detail_kriterias','detail_kriterias.id','=','detail_kriteria_persewaans.detail_kriteria_id')
          ->where('detail_kriteria_persewaans.persewaan_id','=',$iddipilih[2])->get();

          $kriteriawis1 = DB::table('persewaans')
          ->join('kriteria_persewaans', 'kriteria_persewaans.persewaan_id', '=', 'persewaans.id')            
          ->join('kriterias', 'kriteria_persewaans.persewaan_id', '=', 'kriterias.id')          
          ->orderBy('kriteria_persewaans.kriteria_id', 'ASC')
          ->where('persewaans.id', '=',$iddipilih[0])
          ->get();
          $kriteriawis2 = DB::table('persewaans')
          ->join('kriteria_persewaans', 'kriteria_persewaans.persewaan_id', '=', 'persewaans.id')            
          ->join('kriterias', 'kriteria_persewaans.persewaan_id', '=', 'kriterias.id')
          ->orderBy('kriteria_persewaans.kriteria_id', 'ASC')
          ->where('persewaans.id', '=', $iddipilih[1])
          ->get();
          $kriteriawis3 = DB::table('persewaans')
          ->join('kriteria_persewaans', 'kriteria_persewaans.persewaan_id', '=', 'persewaans.id')            
          ->join('kriterias', 'kriteria_persewaans.persewaan_id', '=', 'kriterias.id')
          ->orderBy('kriteria_persewaans.kriteria_id', 'ASC')
          ->where('persewaans.id', '=', $iddipilih[2])
          ->get();
          $gambar1 = DB::table('gambar_persewaans')
          ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
          ->where('persewaans.id', '=', $iddipilih[0])
          ->get();
          $gambar2 = DB::table('gambar_persewaans')
          ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
          ->where('persewaans.id', '=', $iddipilih[1])
          ->get();
          $gambar3 = DB::table('gambar_persewaans')
          ->join('persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
          ->where('persewaans.id', '=', $iddipilih[2])
          ->get();
          return view('user_persewaan.compare',['gambar1'=>$gambar1, 'gambar2' => $gambar2,'gambar3' =>$gambar3,'detwis1'=>$detwis1, 'detwis2' => $detwis2,'detwis3' =>$detwis3,'kriteria'=>$kriteria,'countwis'=>$countwis,'wis1'=>$wis1 , 'wis2' =>$wis2, 'wis3' =>$wis3,  'kriteriawis1'=>$kriteriawis1 , 'kriteriawis2' =>$kriteriawis2, 'kriteriawis3' =>$kriteriawis3]);
        
        }        

    }
    public function filter(Request $request)
    {
      $tipe_ken = $request->get('tipe_ken');
      $rate_ = $request->get('rate');
      $kpsts = $request->get('kapasitas');

      // dd($kpsts);
      $kabupaten = KotaKabupaten::all();
      $persewaan = Persewaan::with('gambar_persewaans')->whereHas('kendaraans.model_kendaraans',
      function ($q) use($tipe_ken,$rate_,$kpsts){
        if(empty($rate_) && !empty($tipe_ken) && !empty($kpsts))
        {
          if($kpsts==1)
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('model_kendaraans.kapasitas','>=',2)->where('model_kendaraans.kapasitas','<=',4);
          }
          elseif($kpsts==2)
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('model_kendaraans.kapasitas','>=',5)->where('model_kendaraans.kapasitas','<=',6);
          }
          else
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('model_kendaraans.kapasitas','>',6);
          }
         
        }
        elseif(!empty($rate_) && empty($tipe_ken) && !empty($kpsts))
        {
          if($kpsts==1)
          {
            $q->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>=',2)
            ->where('model_kendaraans.kapasitas','<=',4)->where('persewaans.status','aktif');
          }
          elseif($kpsts==2)
          {
            $q->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>=',5)
            ->where('model_kendaraans.kapasitas','<=',6)->where('persewaans.status','aktif');
          }
          else
          {
            $q->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>',6)
            ->where('persewaans.status','aktif');
          }

        }
        elseif(!empty($rate_) && !empty($tipe_ken) && empty($kpsts))
        {
          $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
          ->where('persewaans.rating','>=',$rate_);
        }
        elseif(!empty($rate_) && !empty($tipe_ken) && !empty($kpsts))
        {
          if($kpsts == 1)
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>=',2)
            ->where('model_kendaraans.kapasitas','<=',4);
          }
          elseif($kpsts==2)
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>=',5)
            ->where('model_kendaraans.kapasitas','<=',6);
          }
          else
          {
            $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif')
            ->where('persewaans.rating','>=',$rate_)->where('model_kendaraans.kapasitas','>',6);
          }
         
        }
        elseif(empty($rate_) && empty($tipe_ken) && !empty($kpsts))
        {
          if($kpsts == 1)
          {
            $q->where('model_kendaraans.kapasitas','>=',2)->where('model_kendaraans.kapasitas','<=',4)
            ->where('persewaans.status','aktif');
          }
          elseif($kpsts == 2)
          {
            $q->where('model_kendaraans.kapasitas','>=',5)->where('model_kendaraans.kapasitas','<=',6)
            ->where('persewaans.status','aktif');
          }
          else
          {
            $q->where('model_kendaraans.kapasitas','>',6)->where('persewaans.status','aktif');
          }

        }
        elseif(empty($rate_) && !empty($tipe_ken) && empty($kpsts))
        {
          $q->whereIn('jenis_kendaraan',$tipe_ken)->where('persewaans.status','aktif');
        }
        elseif(!empty($rate_) && empty($tipe_ken) && empty($kpsts))
        {
          $q->where('persewaans.rating','>=',$rate_)->where('persewaans.status','aktif');
        }
        else
        {
          $q->where('persewaans.status','aktif');
        }
        
      })->get();
      // dd($persewaan);
      return view('user_persewaan.daftar',['persewaan'=>$persewaan, 'kota'=>$kabupaten]);
    }
    public function filterlokasi(Request $request)
    {
      $kota = $request->get('kota');
      $kabupaten = KotaKabupaten::all();
      $persewaan = Persewaan::with('gambar_persewaans')->whereHas('kelurahans.kecamatans.kabupatens',
      function ($q) use($kota){
          $q->where('persewaans.status','aktif')->whereIn('kabupatens.id',$kota);
      })->get();
      return view('user_persewaan.daftar',['persewaan'=>$persewaan, 'kota'=>$kabupaten]);
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
}
