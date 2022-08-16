<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\CutiSakit;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $absen = Absen::where('user_id', $user_id)->get();
        $absen_each = Absen::where('user_id', $user_id)->first();

        return view('absen.index', ['user_id'=>$user_id,'profile'=>$profile,'absen'=>$absen, "absen_each"=>$absen_each]);

    }
    public function formSakit()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::all();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $unit = UnitKerja::all();
        $sub = SubUnit::all();        
        return view('absen.cuti', ['unit'=>$unit,'sub'=>$sub,'user_id'=>$user_id, 'profile'=>$profile, 'profile_admin'=>$profile, 'profile_admin'=>$profile_admin]);
    }

    public function ajax_get_kerja(){
        $unit = UnitKerja::all();
        return response()->json(['unit'=>$unit]);
    }
    public function ajax_get_sub($id){
        $sub_unit = SubUnit::where('unit_id',$id)->get();
        return response()->json(['sub_unit'=>$sub_unit]);
    }
    public function ajax_get_user($id){
        $profiles = Profile::where('sub_id',$id)->get();
        return response()->json(['profile'=>$profiles]);
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
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', $user_id)->first();

        $absen = new Absen();
        $absen->user_id = $user_id;
        $absen->profile_id = $profile->id;
        $absen->date_abs= $request->date_abs;
        $absen->time_abs = $request->time_abs;
        $absen->save();
        return redirect()->back();
    }

    public function storeSakit(Request $request)
    {
        $user_id = User::where('');

        $cuti = new CutiSakit();
        $cuti->user_id = $request->user_id;
        $cuti->date_sick= $request->date_sick;
        $cuti->keterangan_sakit = $request->keterangan_sakit;

        $docs = $request->file('docs_sick');
        $name = 'Dokumen'.$profile->fullname.date('Y-m-d').'.'.$request->file('docs_sick')->getClientOriginalExtension();
        $docs->move('file/dokumenSakit',$name);

        $cuti->docs_sick = $request->docs_sick;

        $cuti->save();
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
