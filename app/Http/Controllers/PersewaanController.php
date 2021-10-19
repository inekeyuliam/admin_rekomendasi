<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersewaanTerverifikasiExport;
use App\Exports\PersewaanPermintaanExport;
use RealRashid\SweetAlert\Facades\Alert;
use App\JenisKendaraan;
use App\Persewaan;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\DetailKriteriaPersewaan;
use App\Kriteria;
use App\GambarPersewaan;
use PDF;
use DB;
class PersewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listpersewaan = Persewaan::with('kelurahans.kecamatans.kabupatens')->where('status','=','aktif')->get();
        return view('persewaan.index', ['listpersewaan'=>$listpersewaan])->withSuccessMessage(' Persewaan Berhasil diverifikasi!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $iduser = Auth::user()->id;
        $sewa = DB::table('persewaans')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($sewa >0)
        {
           
            Alert::info('Pengajuan Hanya Dapat Digunakan Satu Kali!', 'Silahkan Cek Status Pengajuan Mitra Anda');
            return redirect('home/persewaan');
        }
        else
        {
            $kabupaten = KotaKabupaten::all();
            $kecamatan = Kecamatan::all();
            $kelurahan = Kelurahan::all();
            $listkriteria = Kriteria::where('jenis_kriteria_id',2)->get();
            return view('persewaan.create', ['kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 
            'kelurahan'=>$kelurahan, 'listkriteria'=>$listkriteria]);  
        }
    }
    public function keubah($id)
    {
        // $id = Auth::user()->id;
        $kabupaten = KotaKabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $persewaan =  DB::table('persewaans')
        ->select('persewaans.id','nama_persewaan','jam_buka','jam_tutup','status','rating','link_fb','link_ig','no_telp','no_wa','alamat','nama_kabupaten','nama_kelurahan','nama_kecamatan','kabupaten_id','kecamatan_id','kelurahan_id','keterangan')
        ->join('kelurahans', 'persewaans.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->where('persewaans.id',$id)
        ->first();
        // dd($persewaan);

        $gambarpersewaan = DB::table('persewaans')
        ->join('gambar_persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
        ->where('persewaans.id',$id)
        ->get();

        $allkriteria = DB::table('detail_kriterias')->where("kriteria_id",13)->get();
        $resultArray = DB::table('detail_kriteria_persewaans')->select('detail_kriteria_id')->where('persewaan_id',$id)->get();
        $idkritwis = json_decode(json_encode($resultArray), true);
        $arr =[];
        foreach($idkritwis as $item)
        {
            $arr[]=$item['detail_kriteria_id'];
        }
     
        return view('persewaan.edit',['allkritwis'=>$allkriteria,  'idkritwis'=>$arr, 'list' => $persewaan, 'listgambar' => $gambarpersewaan,'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 
        'kelurahan'=>$kelurahan]);
       
    }
    public function ubah(Request $request, $id)
    {
        $iduser = Auth::user()->id;
        $hot = DB::table('persewaans')
        ->select('persewaans.id')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->first();
        // $id=$hot->id;
        // dd($id);

        $nama_hot = $request->get('nama');
        $kelurahan = $request->get('kelurahan');
        $alamat = $request->get('alamat');
        $link_ig = $request->get('link_ig');
        $link_fb = $request->get('link_fb');
        $no_tlp = $request->get('no_tlp');
        $no_wa = $request->get('no_wa');
        $jambuka = $request->get('buka');
        $jamtutup = $request->get('tutup');
        $rating = $request->get('rating');
        $ket = $request->get('keterangan');
        // dd($iduser);
        DB::table('persewaans')->where('persewaans.id',$id)->update([
            'nama_persewaan' => $nama_hot,
            'kelurahan_id' => $kelurahan,
            'nama_persewaan' => $alamat,
            'kelurahan_id' => $kelurahan,
            'link_fb' => $link_fb,
            'link_ig' => $link_ig,
            'rating' => $rating,
            'no_telp' => $no_tlp,
            'no_wa' => $no_wa,
            'jam_buka' => $jambuka,
            'jam_tutup' => $jamtutup,
            'keterangan' => $ket
        ]);
    
       
        $krit = DetailKriteriaPersewaan::where('detail_kriteria_persewaans.persewaan_id',$id);
        $krit->delete();
        $fasi = $request->get('fasi');

        foreach($fasi as $item)
        {
            $updatefasi = new DetailKriteriaPersewaan();
            $updatefasi->persewaan_id=$id;
            $updatefasi->detail_kriteria_id=$item;
            $updatefasi->save();
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
                        $entry = new GambarPersewaan();
                        $entry->persewaan_id = $id;
                        $entry->filename = $filename;
                        $entry->save();
            }
        }

        return redirect('lihat/persewaan')->withSuccessMessage('Persewaan Kendaraan Berhasil diubah!');

    }

    public function nonaktif()
    {
        $listpersewaan = Persewaan::with('kelurahans.kecamatans.kabupatens')->where('status','=','nonaktif')->where('alasan','=','')->get();
        return view('persewaan.nonaktif', ['listpersewaan'=>$listpersewaan]);
    }
    public function simpan(Request $request)
    {
        $iduser = Auth::user()->id;
        $sewa = Persewaan::where('status','=','aktif')->where('user_id',$iduser)->first();

        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaPersewaan::create([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'persewaan_id'=>$sewa->id,
                'kriteria_id'=>$key
                
            ]);
        }
        return redirect('home/persewaan')->withSuccessMessage('Persewaan Berhasil ditambahkan!');

    }
    public function lihat()
    {

        $iduser = Auth::user()->id;
        $hot = DB::table('persewaans')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();

        if($hot > 0)
        {
                $persewaan =  DB::table('persewaans')
                ->select('persewaans.id','nama_persewaan','jam_buka','jam_tutup','status','rating','link_fb','link_ig','no_telp','no_wa','alamat','nama_kabupaten','nama_kelurahan','nama_kecamatan','keterangan')
                ->join('kelurahans', 'persewaans.kelurahan_id', '=','kelurahans.id')
                ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
                ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
                ->join('users','persewaans.user_id','=','users.id')
                ->where('users.id','=',$iduser)               
                ->first();
                // dd($persewaan);
    
                $gambarpersewaan = DB::table('persewaans')
                ->join('gambar_persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
                ->join('users','persewaans.user_id','=','users.id')
                ->where('users.id','=',$iduser)                  
                ->get();
                
                $detilfasi = DB::table('detail_kriteria_persewaans')
                ->join('detail_kriterias','detail_kriteria_persewaans.detail_kriteria_id','=','detail_kriterias.id')
                ->join('kriterias','detail_kriterias.kriteria_id','=','kriterias.id')
                ->join('persewaans','detail_kriteria_persewaans.persewaan_id','=','persewaans.id')
                ->join('users','persewaans.user_id','=','users.id')
                ->where('users.id','=',$iduser) 
                ->where('kriteria_id',13)->get();

                return view('persewaan.lihat',['list' => $persewaan, 'listgambar' => $gambarpersewaan, 'detail'=>$detilfasi]);
         
           
        }
        else
        {
            
            Alert::info('Anda Belum Mengajukan Sebagai Mitra Persewaan Kendaraan!', 'Silahkan isi form pengajuan terlebih dahulu');
            // return view('homepersewaan',['listpersewaan'=>$listpersewaan, 'detailpersewaan'=>$detailpersewaan]);
            return redirect('persewaan/create');
        }
    }
    public function lihatbobot()
    {

        $iduser = Auth::user()->id;
        $kendaraan = DB::table('persewaans')
        ->join('kendaraans','kendaraans.persewaan_id','=','persewaans.id')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($kendaraan >0)
        {
            $jumdet =  DB::table('kriteria_persewaans')
            ->join('persewaans', 'persewaans.id', '=','kriteria_persewaans.persewaan_id')
            ->join('kriterias', 'kriterias.id', '=','kriteria_persewaans.kriteria_id')
            ->join('users', 'users.id', '=','persewaans.user_id')
            ->where('persewaans.user_id',$iduser)
            ->count();

            if($jumdet < 1)
            {   
                $alamat = DB::table('persewaans')->where('user_id',$iduser)->pluck('alamat')->first();
                $long = DB::table('persewaans')->where('user_id',$iduser)->pluck('longitude')->first();
                $lat = DB::table('persewaans')->where('user_id',$iduser)->pluck('latitude')->first();
        
                $minharga = DB::table('kendaraans')
                ->join('persewaans','persewaans.id','=','kendaraans.persewaan_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)->min('biaya_perhari');
                $kapasitas = DB::table('kendaraans')
                ->join('persewaans','persewaans.id','=','kendaraans.persewaan_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)->max('kapasitas_penumpang');
                $sum = DB::table('kendaraans')
                ->join('persewaans','persewaans.id','=','kendaraans.persewaan_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)->sum('surat_uji');
                $total = DB::table('kendaraans')
                ->join('persewaans','persewaans.id','=','kendaraans.persewaan_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)->count();
                $rata2 = $sum/$total;
                
                $rating = DB::table('persewaans')->where('user_id',$iduser)->pluck('rating')->first();
                $listkriteria = Kriteria::where('jenis_kriteria_id',3)->get();
                $listdetailkriteria = DB::table('detail_kriterias')
                ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
                ->where('kriterias.id','=',3)
                ->get();
                return view('persewaan.bobot', [ 'listdetailkriteria' => $listdetailkriteria,  'listkriteria'=>$listkriteria,
                'rating'=>$rating, 'min'=>$minharga, 'alamat'=>$alamat, 'long'=>$long, 'lat'=>$lat, 
                'kapasitas'=>$kapasitas, 'rata'=>$rata2]);  
            
            }
            else
            {
                $listkriteria =  DB::table('kriteria_persewaans')
                ->join('persewaans', 'persewaans.id', '=','kriteria_persewaans.persewaan_id')
                ->join('kriterias', 'kriterias.id', '=','kriteria_persewaans.kriteria_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)
                ->get();
                return view('persewaan.lihatbobot',['listkriteria'=>$listkriteria]);
            }
        }
        else
        {
            Alert::info('Bobot Persewaan Belum Tersedia!', 'Silahkan Masukan Data Kendaraan Persewaan Terlebih Dahulu');
            return redirect('kendaraan');
        }
    }
    public function ubahbobot(Request $request)
    {
        $iduser = Auth::user()->id;
        $persewaan = Persewaan::where('status','=','aktif')->where('user_id',$iduser)->first();

        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaPersewaan::update([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'persewaan_id'=>$persewaan->id,
                'kriteria_id'=>$key
                
            ]);
        }
        return redirect('lihatbobot/persewaan')->withSuccessMessage('Bobot Persewaan Kendaraan Berhasil diubah!');

    }
    public function kendaraan()
    {

        $iduser = Auth::user()->id;
        $merk = Kendaraan::with('merk_kendaraans')->get();

        $listkend =  DB::table('persewaans')->where('persewaans.user_id',$iduser)
        ->join('kendaraans', 'kendaraans.persewaan_id', '=','persewaans.id')
        ->join('merk_kendaraans', 'kendaraans.merk_kendaraan_id', '=', 'merk_kendaraans.id')
        ->get();
        return view('kendaraan.index',['listkendaraan'=>$listkend, 'listmerk'=>$merk]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alert::info('Status Pengajuan Mitra Persewaan', 'Menunggu diverifikasi!');

        $iduser = Auth::user()->id;
        $nama_persewaan = $request->get('nama');
        $kelurahan = $request->get('kelurahan');
        $alamat = $request->get('alamat');
        $long = $request->get('lng');
        $lat = $request->get('lat');
        $notlp = $request->get('notlp');
        $nowa = $request->get('nowa');
        $fb = $request->get('link_fb');
        $ig = $request->get('link_ig');
        $jambuka = $request->get('buka');
        $jamtutup = $request->get('tutup');
        $rating = $request->get('rating');
        $ket = $request->get('ket');
    
        $sewa = new Persewaan();
        $sewa->user_id = $iduser;
        $sewa->nama_persewaan = $nama_persewaan;
        $sewa->kelurahan_id = $kelurahan;
        $sewa->alamat = $alamat;
        $sewa->longitude = $long;
        $sewa->latitude = $lat;
        $sewa->no_telp = $notlp;
        $sewa->no_wa = $notlp;
        $sewa->link_fb = $fb;
        $sewa->link_ig = $ig;
        $sewa->jam_buka = $jambuka;
        $sewa->jam_tutup = $jamtutup;
        $sewa->rating = $rating;
        $sewa->keterangan = $ket;
        $sewa->status = 'nonaktif';
        $sewa->save();
        $id = $sewa->id;
    
         return redirect('home/persewaan');
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
    public function status($id){
        $data = \DB::table('persewaans')->where('id',$id)->first();
 
        $status_sekarang = $data->status;
 
        if($status_sekarang == 'nonaktif'){
            \DB::table('persewaans')->where('id',$id)->update([
                'status'=>'aktif'
            ]);
        }else{
            \DB::table('persewaans')->where('id',$id)->update([
                'status'=>'nonaktif'
            ]);
        }
        $listpersewaan = Persewaan::where('status','=','aktif')->get();
        return view('persewaan.index', ['listpersewaan'=>$listpersewaan])->withSuccessMessage(' Persewaan Berhasil diverifikasi!');

    }
    public function checkemail(Request $req)
    {
        $iduser = Auth::user()->id;
        $email = $req->email;
        $emailcheck = DB::table('persewaans')->where('email',$email)->and('user_id', $user_id)->count();
        if($emailcheck > 0)
        {
        echo "Email Already In Use.";
        }
    }
    public function cekstatus()
    {
        $iduser = Auth::user()->id;
        $listpersewaan = DB::table('persewaans')
        ->join('kelurahans','kelurahans.id','=','persewaans.kelurahan_id')
        ->join('kecamatans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('kabupatens','kabupatens.id','=','kecamatans.kabupaten_id')
        ->first();
        return view('persewaan.show', ['listpersewaan'=>$listpersewaan]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persewaan =  DB::table('persewaans')
        ->join('kelurahans', 'persewaans.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->where('persewaans.id',$id)

        ->first();
        $gambarpersewaan = DB::table('persewaans')
        ->join('gambar_persewaans', 'gambar_persewaans.persewaan_id','=','persewaans.id')
        ->where('persewaans.id',$id)
        ->get();
        return view('persewaan.show',['list' => $persewaan, 'listgambar' => $gambarpersewaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persewaan =  DB::table('persewaans')
        ->join('kelurahans', 'persewaans.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->first();
        return view('persewaan.edit',['hot' => $persewaan]);
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
        $iduser = Auth::user()->id;

        $nama_hot = $request->get('nama');
        $email = $request->get('email');
        $tipe_hot = $request->get('tipe');
        $kelurahan = $request->get('kelurahan');
        $long = $request->get('long');
        $lat = $request->get('lat');
        $notlp = $request->get('notlp');
    
        $persewaan = Persewaan::find($iduser);
        $persewaan->user_id = $iduser;
        $email->email = $email;
        $persewaan->nama_persewaan = $nama_hot;
        $persewaan->kelurahan_id = $kelurahan;
        $persewaan->longitude = $long;
        $persewaan->latitude = $lat;
        $persewaan->no_telp = $notlp;
        $persewaan->status = 'nonaktif';
        $persewaan->save();
        $id = $persewaan->id;
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

    public function createalasan($id)
    {
        $data = DB::table('persewaans')->where('id',$id)->first();

        return view('persewaan.alasan', ['persewaan'=>$data]);
    }
    public function storealasan(Request $request, $id)
    {
        $alasan = $request->get('alasan');
        DB::table('persewaans')->where('id',$id)->update([
            'alasan'=>$alasan
        ]);
        alert()->success('Persewaan Berhasil Ditolak!', 'Alasan Persewaan Berhasil Terkirim!');
        return redirect('/pengajuan/persewaan');
    }

    public function export_terverifikasi() 
    {
        return Excel::download(new PersewaanTerverifikasiExport, 'DaftarPersewaanTerverifikasi.xlsx');
    }
 
    public function cetak_pdf_terverifikasi()
    {
        $listpersewaan = Persewaan::where('status','=','aktif')->get();
    
        $pdf = PDF::loadview('persewaan.laporan_pdf_terverifikasi',['listpersewaan'=>$listpersewaan])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-persewaan-terverifikasi-pdf');
    }
    public function export_permintaan() 
    {
        return Excel::download(new PersewaanPermintaanExport, 'DaftarPermintaanPersewaan.xlsx');
    }
 
    public function cetak_pdf_permintaan()
    {
        $listpersewaan = Persewaan::where('status','=','nonaktif')->get();
    
        $pdf = PDF::loadview('persewaan.laporan_pdf_permintaan',['listpersewaan'=>$listpersewaan])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-persewaan-permintaan-pdf');
    }
}
