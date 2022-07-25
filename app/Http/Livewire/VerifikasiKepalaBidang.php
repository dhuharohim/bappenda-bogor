<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\ProfilKepalaKantor;
use App\Models\ProfilKepalaSubBidang;
use App\Models\SubUnit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifikasiKepalaBidang extends Component
{
    public $user_id;
    public $profile;
    public $profile_unit;
    public $sub;
    public $activity;
    public $pilihan_1;
    public function render()
    {
        $this->user_id = Auth::user()->id;

        $this->sub = SubUnit::where('unit_id', session('unit_id'))->get();
        $this->activity = Activity::join('profile', 'profile.id','=', 'activity.profile_id')
            ->join('sub_unit','sub_unit.id','=','activity.unit_id')
            ->where('sub_unit.id', $this->pilihan_1)
            ->get();
        
        $this->profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $this->user_id)->first();
      
        return view('livewire.verifikasi-kepala-bidang', ['profile_kepalaBidang'=>$this->profile_kepalaBidang, 'activity' => $this->activity, 'sub' => $this->sub]);
    }
}
