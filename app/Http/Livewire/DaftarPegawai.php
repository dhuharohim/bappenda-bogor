<?php

namespace App\Http\Livewire;

use App\Models\ProfilAdmin;
use App\Models\Profile;
use App\Models\ProfilKepalaKantor;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarPegawai extends Component
{   
    public $unit;
    public $profile;
    public $profile_kepalaKantor;
    public $pilihan;
    public $user_id;
    public function render()
    {
        $this->user_id = Auth::user()->id;
        $this->unit = UnitKerja::all();
        $this->profile = Profile::join('users','users.id','=','profile.user_id')
        ->join('unit_kerja','unit_kerja.id','=','profile.unit_id')
        ->join('posisi','posisi.id','=','profile.posisi_id')
        ->join('sub_unit','sub_unit.id','=','profile.sub_id')
        ->where('unit_kerja.id', $this->pilihan)
        ->get();
        $this->profile_kepalaKantor = ProfilKepalaKantor::where('user_id', $this->user_id)->first();
        return view('livewire.daftar-pegawai', ['profile_kepalaKantor'=>$this->profile_kepalaKantor, 'profile'=>$this->profile,'unit'=>$this->unit]);
        
    }
}
