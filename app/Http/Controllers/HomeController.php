<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\MerkKendaraan;
use App\KotaKabupaten;
use App\Persewaan;
use App\Kecamatan;
use App\Kelurahan;
use App\Hotel;


use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $path = storage_path() . "/json/car_brands.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true); 
        foreach ($json['data'] as $list) {
            $checker = MerkKendaraan::select('nama_merk')->where('nama_merk',$list['name'])->exists();
            if ($checker != true) {
                $merk = new MerkKendaraan();
                $merk->nama_merk = $list['name'];
                $merk->save();
            }
        }
        $pathmotor = storage_path() . "/json/motor_brands.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $json2 = json_decode(file_get_contents($pathmotor), true); 
        foreach ($json2['data'] as $list) {
            $checker = MerkKendaraan::select('nama_merk')->where('nama_merk',$list['name'])->exists();
            if ($checker != true) {
                $merk = new MerkKendaraan();
                $merk->nama_merk = $list['name'];
                $merk->save();
            }
        }  
        $pathwilayah = storage_path() . "/json/wilayah.json"; // ie: /var/www/laravel/app/storage/json/filename.json
        $json3 = json_decode(file_get_contents($pathwilayah), true); 
        foreach ($json3 as $list) {
            if($list['id'] == 35)
            {
                foreach($list['regencies'] as $kab)
                {
                    $checker = KotaKabupaten::select('id')->where('id',$kab['id'])->exists();
                    if ($checker != true) {
                        $kabs = new KotaKabupaten();
                        $kabs->id = $kab['id'];
                        $kabs->nama_kabupaten = $kab['name'];
                        $kabs->save();
                    }
                    foreach($kab['districts'] as $kec)
                    {
                        // print_r($kec['name']);

                        $checker = Kecamatan::select('id')->where('id',$kec['id'])->exists();
                        if ($checker != true) {
                            $kecs = new Kecamatan();
                            $kecs->id = $kec['id'];
                            $kecs->kabupaten_id = $kab['id'];
                            $kecs->nama_kecamatan = $kec['name'];
                            $kecs->save();
                        }
                        foreach($kec['villages'] as $kel)
                        {
                            $checker = Kelurahan::select('id')->where('id',$kel['id'])->exists();
                            if ($checker != true) {
                                $kels = new Kelurahan();
                                $kels->id = $kel['id'];
                                $kels->kecamatan_id = $kec['id'];
                                $kels->nama_kelurahan = $kel['name'];
                                $kels->save();
                            }

                        }
                    }
                }

            }
        } 


        $wisata = DB::table('wisatas')->count();
        $kriteria = DB::table('kriterias')->count();
        $hotel = Hotel::where('status','aktif')->count();
        $sewa = Persewaan::where('status','aktif')->count();
       
        return view('home', compact(['wisata','kriteria','hotel','sewa']));

    }
    public function hotel()
    {
        $iduser = Auth::user()->id;
        $hot = DB::table('hotels')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($hot >0)
        {
            $listhotel=DB::table('hotels')
            ->join('users','hotels.user_id','=','users.id')
            ->where('users.id', $iduser)
            ->first();
            $detailhotel = DB::table('hotels')
            ->join('users','hotels.user_id','=','users.id')
            ->join('kriteria_hotels','hotels.id','=','kriteria_hotels.hotel_id')
            ->where('users.id','=',$iduser)
            ->count();
            $kamarhotel = DB::table('hotels')
            ->join('users','hotels.user_id','=','users.id')
            ->join('kamars','kamars.hotel_id','=','hotels.id')
            ->where('users.id','=',$iduser)
            ->count();
           
            return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel, 'kamarhotel'=> $kamarhotel]);
        
        }
        else{
    
            return redirect('hotel/create');
        }
    }
    public function sewa()
    {
        $iduser = Auth::user()->id;
        $sewa = DB::table('persewaans')
        ->join('users','persewaans.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($sewa >0)
        {
            $listper=DB::table('persewaans')
            ->join('users','persewaans.user_id','=','users.id')
            ->where('users.id', $iduser)
            ->first();
            $detailsewa = DB::table('persewaans')
            ->join('users','persewaans.user_id','=','users.id')
            ->join('kriteria_persewaans','persewaans.id','=','kriteria_persewaans.persewaan_id')
            ->where('users.id','=',$iduser)
            ->count();
            $kendaraansewa = DB::table('persewaans')
            ->join('users','persewaans.user_id','=','users.id')
            ->join('kendaraans','kendaraans.persewaan_id','=','persewaans.id')
            ->where('users.id','=',$iduser)
            ->count();
            return view('homesewa',['listper'=>$listper, 'detailsewa'=>$detailsewa, 'kendaraansewa'=>$kendaraansewa]);
        }
        else
        {
        return view('home');
        }
    }
}
