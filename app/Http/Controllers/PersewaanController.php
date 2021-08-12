<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\JenisKendaraan;
use App\Persewaan;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\DetailKriteriaPersewaan;
use App\Kriteria;
use Illuminate\Support\Facades\Auth;
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
        $listpersewaan = Persewaan::where('status','=','aktif')->get();
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
    public function bobot()
    {
        $iduser = Auth::user()->id;

        $alamat = DB::table('hotels')->where('user_id',$iduser)->pluck('alamat')->first();
        $long = DB::table('hotels')->where('user_id',$iduser)->pluck('longitude')->first();
        $lat = DB::table('hotels')->where('user_id',$iduser)->pluck('latitude')->first();

        $minharga = DB::table('kendaraans')
        ->join('persewaans','persewaans.id','=','kendaraans.persewaan_id')
        ->where('persewaans.user_id',$iduser)->min('biaya_perhari');

        $rating = DB::table('persewaans')->where('user_id',$iduser)->pluck('rating')->first();
        $listkriteria = Kriteria::where('jenis_kriteria_id',3)->get();
        $listdetailkriteria = DB::table('detail_kriterias')
        ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
        ->where('kriterias.id','=',3)
        ->get();
        return view('persewaan.bobot', [ 'listdetailkriteria' => $listdetailkriteria,  'listkriteria'=>$listkriteria, 'rating'=>$rating, 'min'=>$minharga, 'alamat'=>$alamat, 'long'=>$long, 'lat'=>$lat]);  
    
    }

    public function nonaktif()
    {
        $listhotel = Persewaan::where('status','=','nonaktif')->get();
        return view('persewaan.nonaktif', ['listhotel'=>$listhotel]);
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
        $sewa = DB::table('persewaans')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($sewa >0)
        {
            $persewaan =  DB::table('persewaans')
            ->join('kelurahans', 'persewaans.kelurahan_id', '=','kelurahans.id')
            ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
            ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
            ->where('persewaans.user_id',$iduser)
            ->first();
            return view('persewaan.lihat',['list' => $persewaan]);

        }
        else
        {
            
            Alert::info('Anda Belum Mengajukan Sebagai Mitra Persewaan!', 'Silahkan isi form pengajuan terlebih dahulu');
            return redirect('home/persewaan');
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
            $jumdet =  DB::table('detail_kriteria_persewaans')
            ->join('persewaans', 'persewaans.id', '=','detail_kriteria_persewaans.persewaan_id')
            ->join('kriterias', 'kriterias.id', '=','detail_kriteria_persewaans.kriteria_id')
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
                return view('persewaan.bobot', [ 'listdetailkriteria' => $listdetailkriteria,  'listkriteria'=>$listkriteria, 'rating'=>$rating, 'min'=>$minharga, 'alamat'=>$alamat, 'long'=>$long, 'lat'=>$lat, 'kapasitas'=>$kapasitas, 'rata'=>$rata2]);  
            
            }
            else
            {
                $listkriteria =  DB::table('detail_kriteria_persewaans')
                ->join('persewaans', 'persewaans.id', '=','detail_kriteria_persewaans.persewaan_id')
                ->join('kriterias', 'kriterias.id', '=','detail_kriteria_persewaans.kriteria_id')
                ->join('users', 'users.id', '=','persewaans.user_id')
                ->where('persewaans.user_id',$iduser)
                ->get();
                return view('persewaan.lihatbobot',['listkriteria'=>$listkriteria]);
            }
        }
        else
        {
            Alert::info('Bobot Persewaan Belum Tersedia!', 'Silahkan Masukan Data Kendaraan Persewaan Terlebih Dahulu');
            // return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel]);
            return redirect('kendaraan');
        }
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
    
        // $hotels = Hotel::with('peoples')->where('id',$id);    

        // $hot = DB::table('hotels')->where('id',$id)->first();
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
        //
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
        //
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
}
