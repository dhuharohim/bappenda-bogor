<?php

namespace App\Http\Controllers;

use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaKantor;
use App\Models\ProfilKepalaSubBidang;
use App\Models\UnitKerja;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DaftarUserController extends Controller
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
        $profile_kepalaKantor = ProfilKepalaKantor::where('user_id', $user_id)->first();
        $profile_admin = ProfilAdmin::where('user_id', $user_id)->first();
        $profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $user_id)->first();
        $profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id', $user_id)->first();
        if(Auth::user()->role == "kepala bidang"){
            return view('daftar-user.kepalabidang', ['profile_kepalaBidang'=>$profile_kepalaBidang, 'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit, 'user_ed'=>$user_ed]);

        } elseif(Auth::user()->role == "kepala kantor"){
            return view('daftar-user.index', ['profile_kepalaKantor'=>$profile_kepalaKantor, 'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit, 'user_ed'=>$user_ed]);

        }elseif(Auth::user()->role == "admin"){
            return view('daftar-user.index', ['profile_kepalaKantor'=>$profile_kepalaKantor, 'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit, 'user_ed'=>$user_ed]);

        } 

        elseif(Auth::user()->role == "kepala sub bidang"){
            return view('daftar-user.kepalabidang', ['profile_kepalaSubBidang'=>$profile_kepalaSubBidang, 'profile'=>$profile,'user'=> $user, 'profile_admin'=>$profile_admin, 'user_role' => $user_role, 'unit'=>$unit, 'user_ed'=>$user_ed]);


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
    public function store(Request $request, $id)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            
        ]);

        $user = User::where('id', $id)->first();
        #Match The Old Password
        if(!Hash::check($request->old_password, $user->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::where('id', $id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
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
        return view('daftar-user.password',['user'=>$user, 'profile'=>$profile, 'profile_admin'=>$profile_admin]);
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
