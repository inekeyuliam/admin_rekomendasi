<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WisataExport;
use Illuminate\Http\Request;
use App\TipeWisata;
use App\GambarWisata;
use App\Wisata;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\DetailKriteriaWisata;
use App\DetailKriteria;
use App\Kriteria;
use App\GoogleReviewWisata;
use App\ReviewWisata;
use App\OlehOlehWisata;
use App\RestoWisata;

use App\KriteriaWisata;
use App\HargaWisata;
use App\Utilities\GoogleMaps;
use GuzzleHttp\Client;
use PDF;
use DB;
class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        $listtipe = TipeWisata::all();
        $listwisata = Wisata::all();
        $listkota = KotaKabupaten::all();

        return view('wisata.index', ['listtipe'=>$listtipe, 'listwisata'=>$listwisata, 
        'listkot'=>$listkota]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;

        $kabupaten = KotaKabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $listtipe = TipeWisata::all();
        $listkriteria = Kriteria::where('jenis_kriteria_id',1)->get();
        $listdetailkriteria = DB::table('detail_kriterias')
        ->select('detail_kriterias.nama_detail','detail_kriterias.id')
        ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
        ->where('kriterias.id','=',1)
        ->get();
        // dd($listdetailkriteria);

        return view('wisata.create', ['listtipe'=>$listtipe, 'listdetailkriteria' => $listdetailkriteria, 'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'listkriteria'=>$listkriteria]);  
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $client = new Client(); //GuzzleHttp\Client
      
        $iduser = Auth::user()->id;
        
        $weekend = $request->get('weekend');
        $weekdays = $request->get('weekdays');
        $nama_wis = $request->get('nama');
        $tipe_wis = $request->get('tipe');
        $alamat = $request->get('alamat');
        $rating = $request->get('rating');
        $kelurahan = $request->get('kelurahan');
        $lng = $request->get('lng');
        $lat = $request->get('lat');
        $data = DB::table('kelurahans')
        ->join('kecamatans','kelurahans.kecamatan_id','=','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','=','kabupatens.id')
        ->where('kelurahans.id','=',$kelurahan)
        ->first(); 
     
        $jam_buka = $request->get('buka');
        $jam_tutup = $request->get('tutup');
        $ket = $request->get('keterangan');
        $detkrit = $request->get('detkrit');
        // $detail = $detkrit->count();
        
        $wis = new Wisata();
        $wis->user_id =$iduser;
        $wis->nama_wisata = $nama_wis;
        $wis->tipe_wisata_id = $tipe_wis;
        $wis->alamat = $alamat;
        $wis->kelurahan_id = $kelurahan;
        $wis->rating = $rating;
        $wis->latitude = $lat;
        $wis->longitude = $lng;
        $wis->jam_buka = $jam_buka;
        $wis->jam_tutup = $jam_tutup;
        $wis->keterangan = $ket;
        $wis->save();
        $id = $wis->id;

        HargaWisata::create([
            'wisata_id'=>$id,
            'jenis_harga'=>'Weekday',
            'harga_masuk'=>$weekdays
        ]);

        HargaWisata::create([
            'wisata_id'=>$id,
            'jenis_harga'=>'Weekend',
            'harga_masuk'=>$weekend
        ]);

        //5 reviews google

        $rev_name0 = $request->get('review_nama0');
        $rev_name1 = $request->get('review_nama1');
        $rev_name2 = $request->get('review_nama2');
        $rev_name3 = $request->get('review_nama3');
        $rev_name4 = $request->get('review_nama4');

        $rev_text0 = $request->get('review_text0');
        $rev_text1 = $request->get('review_text1');
        $rev_text2 = $request->get('review_text2');
        $rev_text3 = $request->get('review_text3');
        $rev_text4 = $request->get('review_text4');
        
        $rev_rate0 = $request->get('review_rate0');
        $rev_rate1 = $request->get('review_rate1');
        $rev_rate2 = $request->get('review_rate2');
        $rev_rate3 = $request->get('review_rate3');
        $rev_rate4 = $request->get('review_rate4');

        GoogleReviewWisata::create([
            'wisata_id'=>$id,
            'nama'=>  $rev_name0,
            'review'=>$rev_text0,
            'rate' =>$rev_rate0
        ]);

        GoogleReviewWisata::create([
            'wisata_id'=>$id,
            'nama'=>  $rev_name1,
            'review'=>$rev_text1,
            'rate' =>$rev_rate1
        ]);

        GoogleReviewWisata::create([
            'wisata_id'=>$id,
            'nama'=>  $rev_name2,
            'review'=>$rev_text2,
            'rate' =>$rev_rate2
        ]);

        GoogleReviewWisata::create([
            'wisata_id'=>$id,
            'nama'=>  $rev_name3,
            'review'=>$rev_text3,
            'rate' =>$rev_rate3
        ]);

        GoogleReviewWisata::create([
            'wisata_id'=>$id,
            'nama'=>  $rev_name4,
            'review'=>$rev_text4,
            'rate' =>$rev_rate4
        ]);
        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            KriteriaWisata::create([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'wisata_id'=>$id,
                'kriteria_id'=>$key
                
            ]);
        }
        $detail_krit =$request->get('fasi');
        // dd($detail_krit);
        foreach($request->input('fasi') as $key => $value) {
            DetailKriteriaWisata::create([
                'wisata_id'=>$id,
                'detail_kriteria_id'=>$value
            ]);
        }
        $oleh_lat =$request->get('oleh_lat');
        $oleh_long =$request->get('oleh_long');
        $oleh_alamat =$request->get('oleh_alamat');
        $oleh_nama =$request->get('oleh_nama');
        // dd($oleh_nama);
        // dd($detail_krit);
        OlehOlehWisata::create([
                'wisata_id'=>$id,
                'nama_toko'=>$oleh_nama,
                'alamat'=>$oleh_alamat,
                'longitude'=>$oleh_long,
                'latitude'=>$oleh_lat,
        ]);

        $resto_lat =$request->get('resto_lat');
        $resto_long =$request->get('resto_long');
        $resto_alamat =$request->get('resto_alamat');
        $resto_nama =$request->get('resto_nama');
        // dd($detail_krit);
   
        RestoWisata::create([
                'wisata_id'=>$id,
                'nama_resto'=>$resto_nama,
                'alamat'=>$resto_alamat,
                'longitude'=>$resto_long,
                'latitude'=>$resto_lat,
        ]);
     

        $files = $request->file('filename');
        if(! is_null(request('filename')))
        {
            $uploadcount = 0;

            $photos=request('filename');
            foreach ($photos as $photo)
             {
            $destinationPath = 'images';
                $filename =  $photo->getClientOriginalName();
                $photo->move($destinationPath,$filename);
                $uploadcount ++;
               
                $photo->getClientOriginalExtension();
                $entry = new GambarWisata();
                $entry->wisata_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }

        return redirect('wisata')->withSuccessMessage('Wisata Berhasil ditambahkan!');
    }

    public function getKecamatan($id){
        echo json_encode(DB::table('kecamatans')->where("kabupaten_id", $id)->get());
    }

    public function getKelurahan(Request $request)
    {
        $kelurahan = DB::table("kelurahans")
        ->where("kecamatan_id",$request->kecamatan_id)
        ->pluck("nama_kelurahan","id");
        return response()->json($kelurahan);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata =  DB::table('wisatas')
        ->select('wisatas.id','nama_wisata','rating','alamat','tipe_wisata_id','nama_tipe','kabupaten_id','nama_kabupaten','kelurahan_id','nama_kelurahan','jam_buka','jam_tutup','nama_kecamatan','kecamatan_id','keterangan')
        ->join('kelurahans', 'wisatas.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->join('tipe_wisatas', 'tipe_wisatas.id', '=','wisatas.tipe_wisata_id')
        ->where('wisatas.id',$id)
        ->first();

        $gambarwisata = DB::table('wisatas')
        ->join('gambar_wisatas', 'gambar_wisatas.wisata_id','=','wisatas.id')
        ->where('wisatas.id',$id)
        ->get();

        $detilfasi = DB::table('detail_kriteria_wisatas')
        ->join('detail_kriterias','detail_kriteria_wisatas.detail_kriteria_id','=','detail_kriterias.id')
        ->join('kriterias','detail_kriterias.kriteria_id','=','kriterias.id')
        ->join('wisatas','detail_kriteria_wisatas.wisata_id','=','wisatas.id')
        ->where('wisatas.id','=',$id) 
        ->where('kriteria_id',1)->get();
        return view('wisata.show',['list' => $wisata, 'listgambar' => $gambarwisata, 'detail'=>$detilfasi]);
    }

    public function upload()
    {
      
        return back()->with('success', 'Image Upload successfully');
            
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipewisata = TipeWisata::all();
        $kabupaten = KotaKabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $detailwisata = DB::table('kriteria_wisatas')
        ->join('kriterias','kriterias.id','=','kriteria_wisatas.kriteria_id')
        ->join('wisatas','wisatas.id','=','kriteria_wisatas.wisata_id')
        ->where('wisatas.id',$id)->get();

        $listall = DB::table('wisatas')
        ->select('wisatas.id','nama_wisata','rating','alamat','tipe_wisata_id','kabupaten_id','nama_kabupaten','kelurahan_id','nama_kelurahan','jam_buka','jam_tutup','nama_kecamatan','kecamatan_id','keterangan')
        ->join('tipe_wisatas','tipe_wisatas.id','=','wisatas.tipe_wisata_id')
        ->join('kelurahans','kelurahans.id','=','wisatas.kelurahan_id')
        ->join('kecamatans','kelurahans.kecamatan_id','=','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','=','kabupatens.id')
        ->where('wisatas.id','=',$id)
        ->first(); 
        // dd($listall);

        $allkriteria = DB::table('detail_kriterias')->where("kriteria_id",1)->get();
        $resultArray = DB::table('detail_kriteria_wisatas')->select('detail_kriteria_id')->where('wisata_id',$id)->get();
        $idkritwis = json_decode(json_encode($resultArray), true);
        $arr =[];
        foreach($idkritwis as $item)
        {
            $arr[]=$item['detail_kriteria_id'];
        }
       return view('wisata.edit', ['allkritwis'=>$allkriteria,  'idkritwis'=>$arr, 'tipewisata' => $tipewisata, 'wisata' => $listall,
        'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan, 'detailwisata'=>$detailwisata]);
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
        $nama_wis = $request->get('nama');
        $tipe_wis = $request->get('tipe');
        $kelurahan = $request->get('kelurahan');
        $rating = $request->get('rating');
        $long = $request->get('long');
        $lat = $request->get('lat');
        $jam_buka = $request->get('buka');
        $jam_tutup = $request->get('tutup');
        $ket = $request->get('keterangan');
    
        $wis = Wisata::find($id);
        $wis->nama_wisata = $nama_wis;
        $wis->tipe_wisata_id = $tipe_wis;
        $wis->kelurahan_id = $kelurahan;
        $wis->rating = $rating;
        $wis->longitude = $long;
        $wis->latitude = $lat;
        $wis->jam_buka = $jam_buka;
        $wis->jam_tutup = $jam_tutup;
        $wis->keterangan = $ket;
        $wis->save();
        $id = $wis->id;

        $krit = DetailKriteriaWisata::where('detail_kriteria_wisatas.wisata_id',$id);
        $krit->delete();
        $fasi = $request->get('fasi');

        foreach($fasi as $item)
        {
            $updatefasi = new DetailKriteriaWisata();
            $updatefasi->wisata_id=$id;
            $updatefasi->detail_kriteria_id=$item;
            $updatefasi->save();
        }
        
        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaWisata::updateOrCreate([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                    'wisata_id'=>$id,
                    'kriteria_id'=>$key
            ]);
        }
        return redirect('wisata')->withSuccessMessage(' Wisata Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wis = Wisata::find($id);
        $gambarwisata = GambarWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $detailwisata = DetailKriteriaWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $googlewisata = GoogleReviewWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $reviewwisata = ReviewWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $googlewisata = GoogleReviewWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $hargawisata = HargaWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $kriteriawisata = KriteriaWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $olehawisata = OlehOlehWisata::with('wisatas')->where('wisata_id',$id)->delete();
        $restowisata = RestoWisata::with('wisatas')->where('wisata_id',$id)->delete();

        $wis->delete();
        return redirect('wisata');

    }
    public function export() 
    {
        return Excel::download(new WisataExport, 'DaftarWisata.xlsx');
    }
 
    public function cetak_pdf()
    {
        $list = Wisata::all();
    
        $pdf = PDF::loadview('wisata.laporan_pdf',['listwis'=>$list])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-wisata-pdf');
    }

    
}
