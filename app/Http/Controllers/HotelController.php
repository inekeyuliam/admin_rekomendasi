<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HotelPermintaanExport;
use App\Exports\HotelTerverifikasiExport;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\TipeWisata;
use App\Hotel;
use App\Kecamatan;
use App\KotaKabupaten;
use App\Kelurahan;
use App\GambarHotel;
use App\DetailKriteriaHotel;
use App\Kriteria;
use App\JenisKamar;
use App\Kamar;
use PDF;
use DB;
class HotelController extends Controller
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
        $listhotel = Hotel::where('status','=','aktif')->get();
        return view('hotel.index', ['listhotel'=>$listhotel])->withSuccessMessage(' Wisata Berhasil diverifikasi!');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $hot = DB::table('hotels')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($hot >0)
        {
            // Alert::info('Pengajuan Hanya Dapat Digunakan Satu Kali!', 'Silahkan Cek Status Pengajuan Mitra Anda');
            // return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel]);
            return redirect('home/hotel');
        }
        else
        {
            $kabupaten = KotaKabupaten::all();
            $kecamatan = Kecamatan::all();
            $kelurahan = Kelurahan::all();
            $listkriteria = Kriteria::where('jenis_kriteria_id',2)->get();
            Alert::info('Anda Belum Melakukan Pengajuan Mitra', 'Silahkan Isi Form Pengajuan Mitra!');

            return view('hotel.create', ['kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 
            'kelurahan'=>$kelurahan, 'listkriteria'=>$listkriteria]);  
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
        Alert::info('Status Pengajuan Mitra Hotel', 'Menunggu diverifikasi!');
        $iduser = Auth::user()->id;
        $nama_hot = $request->get('nama');
        $tipe_hot = $request->get('tipe');
        $kelurahan = $request->get('kelurahan');
        $alamat = $request->get('alamat');
        $link_ig = $request->get('link_ig');
        $link_fb = $request->get('link_fb');
        $harga = $request->get('harga');
        $notlp = $request->get('notlp');
        $nowa = $request->get('nowa');
        $bintang = $request->get('bintang');
        $rating = $request->get('rating');
        $ket = $request->get('keterangan');
        $lng = $request->get('lng');
        $lat = $request->get('lat');

        $hotel = new Hotel();
        $hotel->user_id = $iduser;
        $hotel->nama_hotel = $nama_hot;
        $hotel->kelurahan_id = $kelurahan;
        $hotel->alamat = $alamat;
        $hotel->link_fb = $link_fb;
        $hotel->link_ig = $link_ig;
        $hotel->rating = $rating;
        $hotel->no_telp = $notlp;
        $hotel->no_wa = $nowa;
        $hotel->bintang = $bintang;
        $hotel->keterangan = $ket;
        $hotel->latitude = $lat;
        $hotel->longitude = $lng;
        $hotel->status = 'nonaktif';
        $hotel->save();
        $id = $hotel->id;

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
                $entry = new GambarHotel();
                $entry->hotel_id = $id;
                $entry->filename = $filename;
                $entry->save();
          }
        }
        // $hotels = Hotel::with('peoples')->where('id',$id);    

        // $hot = DB::table('hotels')->where('id',$id)->first();
        return redirect('home/hotel');
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
    public function bobot()
    {
        $iduser = Auth::user()->id;

        $alamat = DB::table('hotels')->where('user_id',$iduser)->pluck('alamat')->first();
        $long = DB::table('hotels')->where('user_id',$iduser)->pluck('longitude')->first();
        $lat = DB::table('hotels')->where('user_id',$iduser)->pluck('latitude')->first();

        $minharga = DB::table('kamars')
        ->join('hotels','hotels.id','=','kamars.hotel_id')
        ->where('hotels.user_id',$iduser)->min('biaya_permalam');

        $rating = DB::table('hotels')->where('user_id',$iduser)->pluck('rating')->first();
        $listkriteria = Kriteria::where('jenis_kriteria_id',2)->get();
        $listdetailkriteria = DB::table('detail_kriterias')
        ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
        ->where('kriterias.id','=',2)
        ->get();
        return view('hotel.bobot', [ 'listdetailkriteria' => $listdetailkriteria,  
        'listkriteria'=>$listkriteria, 'rating'=>$rating, 'min'=>$minharga, 'alamat'=>$alamat, 
        'long'=>$long, 'lat'=>$lat]);  
        
    }

    public function nonaktif()
    {
        $listhotel = Hotel::where('status','=','nonaktif')->where('alasan','=','')->get();
        return view('hotel.nonaktif', ['listhotel'=>$listhotel])->with('success','Hotel berhasil diverifikasi successfully');
        
    }
    public function simpan(Request $request)
    {
        $iduser = Auth::user()->id;
        $hotel = Hotel::where('status','=','aktif')->where('user_id',$iduser)->first();

        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaHotel::create([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'hotel_id'=>$hotel->id,
                'kriteria_id'=>$key
                
            ]);
        }
        return redirect('home/hotel');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id){
        $data = \DB::table('hotels')->where('id',$id)->first();
        $status_sekarang = $data->status;
        if($status_sekarang == 'nonaktif'){
            \DB::table('hotels')->where('id',$id)->update([
                'status'=>'aktif'
            ]);
        }else{
            \DB::table('hotels')->where('id',$id)->update([
                'status'=>'nonaktif'
            ]);
        }
        $listhotel = Hotel::where('status','=','aktif')->get();
        return view('hotel.index', ['listhotel'=>$listhotel])
            ->withSuccessMessage(' Hotel Berhasil diverifikasi!');
    }

    public function show($id)
    {
        $iduser = Auth::user()->id;
        $hotel =  DB::table('hotels')
        ->join('kelurahans', 'hotels.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->first();

        $gambarhotel = DB::table('hotels')
        ->join('gambar_hotels', 'gambar_hotels.hotel_id','=','hotels.id')
        ->where('hotels.id',$id)
        ->get();
        return view('hotel.show',['list' => $hotel, 'listgambar' => $gambarhotel]);
       
    }

    public function lihat()
    {

        $iduser = Auth::user()->id;
        $hot = DB::table('hotels')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($hot >0)
        {
            $hotel =  DB::table('hotels')
            ->join('kelurahans', 'hotels.kelurahan_id', '=','kelurahans.id')
            ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
            ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
            ->where('hotels.user_id',$iduser)
            ->first();
            return view('hotel.lihat',['list' => $hotel]);

        }
        else
        {
            
            Alert::info('Anda Belum Mengajukan Sebagai Mitra Hotel!', 'Silahkan isi form pengajuan terlebih dahulu');
            // return view('homehotel',['listhotel'=>$listhotel, 'detailhotel'=>$detailhotel]);
            return redirect('hotel/create');
        }
    }

    public function lihatbobot()
    {

        $iduser = Auth::user()->id;
        $kendaraan = DB::table('hotels')
        ->join('kamars','kamars.hotel_id','=','hotels.id')
        ->join('users','hotels.user_id','=','users.id')
        ->where('users.id','=',$iduser)
        ->count();
        if($kendaraan >0)
        {
            $jumdet =  DB::table('kriteria_hotels')
            ->join('hotels', 'hotels.id', '=','kriteria_hotels.hotel_id')
            ->join('kriterias', 'kriterias.id', '=','kriteria_hotels.kriteria_id')
            ->join('users', 'users.id', '=','hotels.user_id')
            ->where('hotels.user_id',$iduser)
            ->count();

            if($jumdet < 1)
            {   
                $alamat = DB::table('hotels')->where('user_id',$iduser)->pluck('alamat')->first();
                $long = DB::table('hotels')->where('user_id',$iduser)->pluck('longitude')->first();
                $lat = DB::table('hotels')->where('user_id',$iduser)->pluck('latitude')->first();
        
                $minharga = DB::table('kamars')
                ->join('hotels','hotels.id','=','kamars.hotel_id')
                ->join('users', 'users.id', '=','hotels.user_id')
                ->where('hotels.user_id',$iduser)->min('biaya_permalam');

                $rating = DB::table('hotels')->where('user_id',$iduser)->pluck('rating')->first();
                $listkriteria = Kriteria::where('jenis_kriteria_id',2)->get();
                $listdetailkriteria = DB::table('detail_kriterias')
                ->join('kriterias','kriterias.id','=','detail_kriterias.kriteria_id')
                ->where('kriterias.id','=',2)
                ->get();
                return view('hotel.bobot', [ 'listdetailkriteria' => $listdetailkriteria,  'listkriteria'=>$listkriteria, 
                'rating'=>$rating, 'min'=>$minharga, 'alamat'=>$alamat, 'long'=>$long, 'lat'=>$lat]);  
            
            }
            else
            {
                $listkriteria =  DB::table('kriteria_hotels')
                ->join('hotels', 'hotels.id', '=','kriteria_hotels.hotel_id')
                ->join('kriterias', 'kriterias.id', '=','kriteria_hotels.kriteria_id')
                ->join('users', 'users.id', '=','hotels.user_id')
                ->where('hotels.user_id',$iduser)
                ->get();
                return view('hotel.lihatbobot',['listkriteria'=>$listkriteria]);
            }
        }
        else
        {
            Alert::info('Bobot Hotel Belum Tersedia!', 'Silahkan Masukan Data Kamar Hotel Terlebih Dahulu');
            return redirect('kamar');
        }
    }
    public function kamar()
    {

        $iduser = Auth::user()->id;
        $jeniskamar = Kamar::with('jenis_kamars')->get();

        $listkamar =  DB::table('hotels')->where('hotels.user_id',$iduser)
        ->join('kamars', 'kamars.hotel_id', '=','hotels.id')
        ->join('jenis_kamars', 'kamars.jenis_kamar_id', '=', 'jenis_kamars.id')
        ->get();
        return view('kamar.index',['listkamar'=>$listkamar, 'jeniskamar'=>$jeniskamar]);
    }
    public function keubah()
    {
        $iduser = Auth::user()->id;
        $hot =  DB::table('hotels')->where('hotels.user_id',$iduser)
        ->join('kelurahans', 'hotels.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->first();
        $kabupaten = KotaKabupaten::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        return view('hotel.edit',['hot' => $hot,'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 
        'kelurahan'=>$kelurahan,]);
       
    }
    public function keubahbobot()
    {
        $iduser = Auth::user()->id;

        $listkriteria =  DB::table('kriteria_hotels')
        ->join('hotels', 'hotels.id', '=','kriteria_hotels.hotel_id')
        ->join('kriterias', 'kriterias.id', '=','kriteria_hotels.kriteria_id')
        ->join('users', 'users.id', '=','hotels.user_id')
        ->where('hotels.user_id',$iduser)
        ->get();
        return view('hotel.editbobot',['listkriteria'=>$listkriteria]);

       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel =  DB::table('hotels')
        ->join('kelurahans', 'hotels.kelurahan_id', '=','kelurahans.id')
        ->join('kecamatans', 'kelurahans.kecamatan_id', '=','kecamatans.id')
        ->join('kabupatens', 'kecamatans.kabupaten_id', '=','kabupatens.id')
        ->first();
        return view('hotel.edit',['hot' => $hotel]);


    }
    public function ubah(Request $request)
    {
        $iduser = Auth::user()->id;
     
        $nama_hot = $request->get('nama');
        $email = $request->get('email');
        $tipe_hot = $request->get('tipe');
        $kelurahan = $request->get('kelurahan');
        $long = $request->get('long');
        $lat = $request->get('lat');
        $harga = $request->get('harga');
        $notlp = $request->get('notlp');
        DB::table('hotels')->where('user_id',$iduser)->update([
            'email' => $email,
            'nama_hotel' => $nama_hot,
            'kelurahan_id' => $kelurahan,
            'longitude' => $long,
            'latitude' => $lat,
            'harga_permalam' => $harga,
            'no_telp' => $notlp
        ]);
     
        return redirect('lihat/hotel')->withSuccessMessage('Hotel Berhasil diubah!');

    }
    public function ubahbobot(Request $request)
    {
        $iduser = Auth::user()->id;
        $hotel = Hotel::where('status','=','aktif')->where('user_id',$iduser)->first();

        $nilais = $request->nilai_kriteria;
        foreach($request->input('nilai_kriteria') as $key => $value) {
            DetailKriteriaHotel::update([
                'nilai'=>  $request->input('nilai_kriteria')[$key],
                'hotel_id'=>$hotel->id,
                'kriteria_id'=>$key
                
            ]);
        }
        return redirect('lihatbobot/hotel')->withSuccessMessage('Bobot Hotel Berhasil diubah!');

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
    
        $hotel = Hotel::find($iduser);
        $hotel->user_id = $iduser;
        $email->email = $email;
        $hotel->nama_hotel = $nama_hot;
        $hotel->kelurahan_id = $kelurahan;
        $hotel->longitude = $long;
        $hotel->latitude = $lat;
        $hotel->no_telp = $notlp;
        $hotel->status = 'nonaktif';
        $hotel->save();
        $id = $hotel->id;
    }
    public function cekstatus()
    {
        $iduser = Auth::user()->id;
        $listhotel = DB::table('hotels')
        ->join('kelurahans','kelurahans.id','=','hotels.kelurahan_id')
        ->join('kecamatans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('kabupatens','kabupatens.id','=','kecamatans.kabupaten_id')
        ->where('user_id','=',$iduser)
        ->get();
        return view('hotel.cek', ['listhotel'=>$listhotel]);
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
        $data = DB::table('hotels')->where('id',$id)->first();
        return view('hotel.alasan', ['hotel'=>$data]);
    }
    public function storealasan(Request $request, $id)
    {
        $alasan = $request->get('alasan');
        DB::table('hotels')->where('id',$id)->update(['alasan'=>$alasan]);
        alert()->success('Hotel Berhasil Ditolak!', 'Alasan Hotel Berhasil Terkirim!');
        return redirect('/pengajuan/hotel');
    }

    public function export_terverifikasi() 
    {
        return Excel::download(new HotelTerverifikasiExport, 'DaftarHotelTerverifikasi.xlsx');
    }
 
    public function cetak_pdf_terverifikasi()
    {
        $listhotel = Hotel::where('status','=','aktif')->get();
    
        $pdf = PDF::loadview('hotel.laporan_pdf_terverifikasi',['listhotel'=>$listhotel])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-hotel-terverifikasi-pdf');
    }
    public function export_permintaan() 
    {
        return Excel::download(new HotelPermintaanExport, 'DaftarHotelPermintaan.xlsx');
    }
 
    public function cetak_pdf_permintaan()
    {
        $listhotel = Hotel::where('status','=','nonaktif')->get();
    
        $pdf = PDF::loadview('hotel.laporan_pdf_permintaan',['listhotel'=>$listhotel])->setPaper('a4', 'landscape');;
        return $pdf->download('laporan-hotel-permintaan-pdf');
    }
}
