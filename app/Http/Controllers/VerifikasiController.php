<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaKantor;
use App\Models\ProfilKepalaSubBidang;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;


        $profile = Profile::join('posisi', 'posisi.id', '=', 'profile.posisi_id')
        ->join('activity', 'activity.profile_id', '=', 'profile.id')
        ->join('sub_unit', 'sub_unit.id', '=', 'profile.sub_id')
        ->join('unit_kerja', 'unit_kerja.id','=','profile.unit_id')
        ->join('users', 'users.id','=','profile.user_id')
        ->where('users.role', 'karyawan')
        ->where('profile.unit_id', session('unit_id'))
        ->get();
        $profile_unit = Profile::join('activity', 'activity.profile_id', '=','profile.id')
        ->join('posisi', 'posisi.id', '=', 'profile.posisi_id')
        ->join('sub_unit','sub_unit.id','=','profile.sub_id')
        ->join('users', 'users.id','=','profile.user_id')
        ->where('users.role', 'karyawan')
        ->where('profile.sub_id', session('sub_id'))
        ->get();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $user_id)->first();
        $profile_kepalaKantor = ProfilKepalaKantor::where('user_id', $user_id)->first();
        $profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id', $user_id)->first();
        if(Auth::user()->role == "admin"){
            return view('verifikasi.index', ['profile_admin'=>$profile_admin, 'profile' => $profile]);
        }elseif(Auth::user()->role == "kepala bidang"){
            return view('verifikasi.kepala-bidang', ['profile_kepalaBidang'=>$profile_kepalaBidang, 'profile' => $profile]);
        }
        elseif(Auth::user()->role == "kepala sub bidang"){
            return view('verifikasi.kepala-sub-bidang', ['profile_kepalaSubBidang'=>$profile_kepalaSubBidang, 'profile' => $profile_unit]);
            
        }
        else{
            return view('verifikasi.kepala-kantor', ['profile_kepalaKantor'=>$profile_kepalaKantor, 'profile' => $profile]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        
        $data = Activity::where('user_id', $id)->get();

        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id', $user_id)->first();
        return view('verifikasi.edit', ['data' => $data, 'profile_admin' => $profile_admin, 'user_id' => $user_id, 'profile_kepalaSubBidang'=>$profile_kepalaSubBidang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $data = Activity::findOrFail($id);
        $data->status_act = $request->status_act;
        $data->update();
        return redirect()->back();
        // $user_id = Auth::user()->id;
        // $profile = Profile::all();
        // return view('verifikasi.edit.index', ['data' => $data, 'profile' => $profile, 'user_id' => $user_id]);
    }

    public function update_alasan(Request $request, $id)
    {
        $data = Activity::findOrFail($id);
        $data->alasan_act = $request->alasan_act;
        $data->update();
        return redirect()->back();
        // $user_id = Auth::user()->id;
        // $profile = Profile::all();
        // return view('verifikasi.edit.index', ['data' => $data, 'profile' => $profile, 'user_id' => $user_id]);
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
