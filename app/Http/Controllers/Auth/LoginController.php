<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaKantor;
use App\Models\ProfilKepalaSubBidang;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'kepala bidang') {
                $profile = ProfilKepalaBidang::where('user_id', auth()->user()->id)->first();
                //namesub
                $unit = UnitKerja::where('id', $profile->unit_id)->first();


                session([
                    'unit_id' => $profile->unit_id,

                    'name_unit' => $unit->name_unit,


                ]);
            } elseif (auth()->user()->role == 'kepala sub bidang') {
                $profile = ProfilKepalaSubBidang::where('user_id', auth()->user()->id)->first();
                $unit = UnitKerja::where('id', $profile->unit_id)->first();
                $sub = SubUnit::where('id', $profile->sub_id)->first();

                session([
                    'unit_id' => $profile->unit_id,
                    'sub_id' => $profile->sub_id,
                    'name_unit' => $unit->name_unit,
                    'name_sub' => $sub->name_sub,

                ]);
            } elseif (auth()->user()->role == 'admin') {
                $profile = ProfilAdmin::where('user_id', auth()->user()->id)->first();
                //no name_sub
                $unit = UnitKerja::where('id', $profile->unit_id)->first();


                session([
                    'unit_id' => $profile->unit_id,

                    'name_unit' => $unit->name_unit,


                ]);
            } elseif (auth()->user()->role == 'karyawan') {
                $profile = Profile::where('user_id', auth()->user()->id)->first();
                $unit = UnitKerja::where('id', $profile->unit_id)->first();
                $sub = SubUnit::where('id', $profile->sub_id)->first();

                session([
                    'unit_id' => $profile->unit_id,
                    'sub_id' => $profile->sub_id,
                    'name_unit' => $unit->name_unit,
                    'name_sub' => $sub->name_sub,

                ]);
            } elseif (auth()->user()->role == 'kepala kantor') {
                $profile = ProfilKepalaKantor::where('user_id', auth()->user()->id)->first();
                //no name unit
            }

            if (auth()->user()->role == "admin") {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('dashboard.data');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
