<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaKantor;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Verifikasi extends Component
{   
    public $pilihan;
    public $pilihan_2;
    public $user_id;
    public $data;
        
    public $profile_admin;
    public $profile;
    public $profile_kepalaKantor;

    public $unit;
    public $unit_id;
    public $activity;
   
    public function render()
    {
        
        $this->user_id = Auth::user()->id;
        $this->data = Activity::all();
            
        $this->profile_admin = ProfilAdmin::where('user_id', $this->user_id)->first();
        $this->profile = Profile::where('user_id', $this->user_id)->first();

      

        $this->unit = UnitKerja::all();
       
        // if($this->pilihan != NULL){
        //     $this->activity = Activity::join('profile', 'profile.id','=', 'activity.profile_id')
        //     ->join('unit_kerja','unit_kerja.id','=','activity.unit_id')
        //     ->where('unit_kerja.id', $this->pilihan)
        //     ->get();
        // } else {
        //     $this->activity = Activity::join('profile', 'profile.id','=', 'activity.profile_id')
        //     ->join('unit_kerja','unit_kerja.id','=','activity.unit_id')
        //     ->get();
        // }

             $this->activity = Activity::join('profile', 'profile.id','=', 'activity.profile_id')
            ->join('unit_kerja','unit_kerja.id','=','activity.unit_id')
            ->join('posisi', 'posisi.id','=','activity.posisi_id')
            ->join('sub_unit', 'sub_unit.id', '=', 'activity.sub_id')
            ->where('unit_kerja.id', $this->pilihan)
            ->get();

            return view('livewire.verifikasi', ['activity'=>$this->activity, 'data' => $this->data, 'profile' => $this->profile, 'user_id' => $this->user_id, 'unit'=>$this->unit ]);
    }
}
