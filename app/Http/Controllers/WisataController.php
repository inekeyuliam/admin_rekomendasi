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
use App\WisataPunyaDetailKriteria;
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

        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaWisata::create([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'wisata_id'=>$id,
                'kriteria_id'=>$key
                
            ]);
        }
        $detail_krit =$request->get('fasi');
        // dd($detail_krit);
        foreach($request->input('fasi') as $key => $value) {
            WisataPunyaDetailKriteria::create([
                'wisata_id'=>$id,
                'detail_kriteria_id'=>$value
            ]);
        }
        
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
        //
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
        $detailwisata = DetailKriteriaWisata::where('wisata_id',$id)->get();
       
        $listall = DB::table('wisatas')
        ->join('kelurahans','kelurahans.id','=','wisatas.kelurahan_id')
        ->join('kecamatans','kelurahans.kecamatan_id','=','kecamatans.id')
        ->join('kabupatens','kecamatans.kabupaten_id','=','kabupatens.id')
        ->where('wisatas.id','=',$id)
        ->first(); 
       return view('wisata.edit', ['tipewisata' => $tipewisata, 'wisata' => $listall,
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
