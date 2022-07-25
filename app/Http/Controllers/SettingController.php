<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Posisi;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaSubBidang;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;      
        $user = User::all();
        $user_ed = User::where('id', $user_id);
        $profile = Profile::where('user_id', $user_id);
        $unit = UnitKerja::all();
        $unit_bidang = UnitKerja::where('id', session('unit_id'))->get();
        $unit_sub = UnitKerja::where('id', session('sub_id'))->get();
        $posisi = Posisi::orderBy('id','DESC')->take(2)->get();
        $sub_unit = SubUnit::all();
        $subUnit_bidang = SubUnit::where('unit_id', session('unit_id'))->get();
        $subUnit = SubUnit::where('id', session('sub_id'))->get();
        $profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $user_id)->first();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id',$user_id)->first();
        if(Auth::user()->role == "admin"){
        return view('setting.index', ['sub_unit'=>$sub_unit,'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit, 'user_ed'=>$user_ed, 'posisi' => $posisi]);

        }elseif(Auth::user()->role == "kepala bidang"){
            return view('setting.kepala-bidang', ['profile_kepalaBidang'=> $profile_kepalaBidang, 'sub_unit'=>$subUnit_bidang,'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit_bidang, 'user_ed'=>$user_ed, 'posisi' => $posisi]);

        }
        elseif(Auth::user()->role == "kepala sub bidang"){
            return view('setting.kepala-sub-bidang', ['profile_kepalaSubBidang'=> $profile_kepalaSubBidang, 'sub_unit'=>$subUnit,'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit_bidang, 'user_ed'=>$user_ed, 'posisi' => $posisi]);

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
        
        $user_id = new User;
        $user_id->name = $request->name;
        $user_id->role = $request->role;
        $user_id->email = $request->email;
        $user_id->password = Hash::make($request->password);
        $user_id->save();


        $profile = new Profile;
        $profile->fullname = $user_id->name;
        $profile->user_id = $user_id->id;
        $profile->unit_id = $request->unit_id;
        $profile->sub_id = $request->sub_unit;
        $profile->posisi_id = $request->posisi_id;
        $profile->save();

        return redirect()->back();


    }

    public function storeunit(Request $request)
    {
        $unit = new UnitKerja;
        $unit->name_unit = $request->name_unit;
        $unit->save();

        $posisi = new Posisi;
        $posisi->name_posisi = $request->name_posisi;
        $posisi->save();
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
        $user_id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        return view('setting.access',['user'=>$user, 'profile'=>$profile, 'profile_admin'=>$profile_admin]);
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
        $user = User::where('id', $id)->first();
        $user_email = $user->email;
        $user->role = $request->role;
        if($user->email == $user_email){
            $user->email = $request->email;
            $user->save();
        } else{
            $user->save();
        }

        
        
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
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back();
    }
}
