<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Posisi;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaKantor;
use App\Models\ProfilKepalaSubBidang;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();   
        $data = Activity::where('user_id', $user_id)->get();
        $unit = UnitKerja::where('id', $user_id)->get();
        $posisi = Posisi::where('id', $user_id)->get();
        $profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $profile_kepalaKantor = ProfilKepalaKantor::where('user_id', $user_id)->first();
        $profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id', $user_id)->first();
        $kota_bogor = Kota::whereIn('name', 
        [
            'KABUPATEN BOGOR', 'KABUPATEN BEKASI', 'KOTA DEPOK'
        ]
        )->get();
        $kota_banten = Kota::whereIn('name', 
        [
            'KABUPATEN TANGERANG', 'KOTA TANGERANG SELATAN', 'KABUPATEN SERANG'
        ]
        )->get();
        $kota_jaksel = Kota::where('province_code', '31')->get();
        $kecamatan_jaksel = Kecamatan::where('city_code', '3174')->get();
        $kecamatan_jaktim = Kecamatan::where('city_code', '3175')->get();
        $kecamatan_jakbar = Kecamatan::where('city_code', '3173')->get();
        $kecamatan_jakpus = Kecamatan::where('city_code', '3171')->get();
        $kecamatan_jakut= Kecamatan::where('city_code', '3172')->get();

        $kecamatan_bogor= Kecamatan::where('city_code', '3201')->get();
        $kecamatan_bekasi= Kecamatan::where('city_code', '3216')->get();
        $kecamatan_depok = Kecamatan::where('city_code', '3276')->get();
        
        $kecamatan_tangerang = Kecamatan::where('city_code', '3603')->get();
        $kecamatan_kotang = Kecamatan::where('city_code', '3671')->get();
        $kecamatan_serang = Kecamatan::where('city_code', '3604')->get();

        if(Auth::user()->role == 'admin'){
            return view('dashboard.index', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile_admin'=>$profile_admin, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
        } 
        elseif(Auth::user()->role == 'kepala kantor'){
            return view('dashboard.kepala-kantor', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile_kepalaKantor'=>$profile_kepalaKantor, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
        }
        
        elseif(Auth::user()->role == "kepala bidang"){
            return view('dashboard.kepala-bidang', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile_kepalaBidang'=>$profile_kepalaBidang, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
        }elseif(Auth::user()->role == "kepala sub bidang"){
            return view('dashboard.kepala-sub-bidang', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile_kepalaSubBidang'=>$profile_kepalaSubBidang, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
        }
        else{
            return view('dashboard.index-user', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile'=>$profile, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
        }

        }
       

    public function profile()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();   
        $data = Activity::where('user_id', $user_id)->get();
        $unit = UnitKerja::where('id', $user_id)->get();
        $posisi = Posisi::where('id', $user_id)->get();
        $profile = Profile::where('user_id', $user_id)->first();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $kota_bogor = Kota::whereIn('name', 
        [
            'KABUPATEN BOGOR', 'KABUPATEN BEKASI', 'KOTA DEPOK'
        ]
        )->get();
        $kota_banten = Kota::whereIn('name', 
        [
            'KABUPATEN TANGERANG', 'KOTA TANGERANG SELATAN', 'KABUPATEN SERANG'
        ]
        )->get();
        $kota_jaksel = Kota::where('province_code', '31')->get();
        $kecamatan_jaksel = Kecamatan::where('city_code', '3174')->get();
        $kecamatan_jaktim = Kecamatan::where('city_code', '3175')->get();
        $kecamatan_jakbar = Kecamatan::where('city_code', '3173')->get();
        $kecamatan_jakpus = Kecamatan::where('city_code', '3171')->get();
        $kecamatan_jakut= Kecamatan::where('city_code', '3172')->get();

        $kecamatan_bogor= Kecamatan::where('city_code', '3201')->get();
        $kecamatan_bekasi= Kecamatan::where('city_code', '3216')->get();
        $kecamatan_depok = Kecamatan::where('city_code', '3276')->get();
        
        $kecamatan_tangerang = Kecamatan::where('city_code', '3603')->get();
        $kecamatan_kotang = Kecamatan::where('city_code', '3671')->get();
        $kecamatan_serang = Kecamatan::where('city_code', '3604')->get();

        return view('profile.index', ['data' => $data, 
            'kota_bogor' => $kota_bogor,
            'kota_jaksel' => $kota_jaksel, 
            'kota_banten' => $kota_banten, 
            'kecamatan_jaksel' => $kecamatan_jaksel, 
            'kecamatan_jaktim' => $kecamatan_jaktim,
            'kecamatan_jakbar' => $kecamatan_jakbar,
            'kecamatan_jakpus' => $kecamatan_jakpus,
            'kecamatan_jakut' => $kecamatan_jakut,

            'kecamatan_bogor' => $kecamatan_bogor,
            'kecamatan_bekasi' => $kecamatan_bekasi,
            'kecamatan_depok' => $kecamatan_depok,

            'kecamatan_tangerang' => $kecamatan_tangerang,
            'kecamatan_kotang' => $kecamatan_kotang,
            'kecamatan_serang' => $kecamatan_serang,

            'profile'=>$profile, 'user'=>$user, 'unit'=>$unit, 
            'posisi'=>$posisi]);
    }

    public function profileadmin()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $user = User::where('id', $user_id)->first();
        return view('profile.index',['profile'=>$profile, 'user_id'=>$user_id, 'user' => $user]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        
        $data = Activity::where('user_id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $unit = UnitKerja::where('id', $profile->unit_id)->first();
      
        return view('input.index', ['unit'=>$unit,'data' => $data, 'profile'=>$profile, 'user_id'=>$user_id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $unit = UnitKerja::where('id', $profile->unit_id)->first();
        $posisi = Posisi::where('id', $profile->posisi_id)->first();
        $sub = SubUnit::where('id', $profile->sub_id)->first();
        
        $data = new Activity();
        $data->user_id = $user_id;
        $data->unit_id = $unit->id;
        $data->profile_id = $profile->id;
        $data->posisi_id = $posisi->id;
        $data->sub_id = $sub->id;
        $data->date_act = $request->date_act;
        $data->desc_act = $request->desc_act;
        $data->output_act = $request->output_act;
        $data->time_act = $request->time_act;
        $data->quantitiy_act = $request->quantitiy_act;
        $data->docs_act = $request->docs_act;
        $data->quant_desc = $request->quant_desc;
        $data->status_act = $request->status_act;
        $data->save();


        $data = Activity::where('user_id', $user_id)->first();
        return redirect()->route('dashboard.data', [$data, $profile]);
    }

    public function storeprofile(Request $request)
    {
        $user_id = Auth::user()->id;
        $profile = new Profile;
        $profile->user_id = $user_id;
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->unit_kerja = $request->unit_kerja;
        $profile->posisi = $request->posisi;
        $profile->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $user_id = Auth::user()->id;       
        $profile = Profile::where('user_id', $user_id)->first();
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->posisi = $request->posisi;
        $profile->save();
        return redirect()->back();
    }

    public function updateadmin(Request $request, $id)
    {
        $user_id = Auth::user()->id;       
        $profile = ProfilAdmin::where('user_id', $user_id)->first();
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->save();
        return redirect()->back();
    }

    public function updatekepala(Request $request, $id)
    {
        $user_id = Auth::user()->id;       
        $profile = ProfilKepalaKantor::where('user_id', $user_id)->first();
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->save();
        return redirect()->back();
    }
    public function updatekepalabidang(Request $request, $id)
    {
        $user_id = Auth::user()->id;       
        $profile = ProfilKepalaBidang::where('user_id', $user_id)->first();
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->save();
        return redirect()->back();
    }
    public function updatekepalasubbidang(Request $request, $id)
    {
        $user_id = Auth::user()->id;       
        $profile = ProfilKepalaSubBidang::where('user_id', $user_id)->first();
        $profile->fullname = $request->fullname;
        $profile->birth_date = $request->birth_date;
        $profile->handphone = $request->handphone;
        $profile->religion= $request->religion;
        $profile->status = $request->status;
        $profile->absen = $request->absen;
        $profile->npwp = $request->npwp;
        $profile->nik = $request->nik;
        $profile->kabupaten = $request->kabupaten;
        $profile->kelurahan = $request->kelurahan;
        $profile->kecamatan = $request->kecamatan;
        $profile->alamat_lengkap = $request->alamat_lengkap;
        $profile->save();
        return redirect()->back();
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
