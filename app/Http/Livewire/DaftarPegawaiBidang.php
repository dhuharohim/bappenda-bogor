<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\ProfilKepalaBidang;
use App\Models\SubUnit;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarPegawaiBidang extends Component
{
    public $sub;
    public $profile;
    public $profile_kepalaBidang;
    public $pilihan;
    public $user_id;
   
        
    public function render()
    {
        $this->user_id = Auth::user()->id;
        $this->sub = SubUnit::where('unit_id', session('unit_id'))->get();
        $this->profile = Profile::join('users','users.id','=','profile.user_id')
        ->join('unit_kerja','unit_kerja.id','=','profile.unit_id')
        ->join('posisi','posisi.id','=','profile.posisi_id')
        ->join('sub_unit','sub_unit.id','=','profile.sub_id')
        ->where('sub_unit.id', $this->pilihan)
        ->get();
        $this->profile_kepalaBidang = ProfilKepalaBidang::where('user_id', $this->user_id)->first();
        return view('livewire.daftar-pegawai-bidang', ['profile_kepalaBidang'=>$this->profile_kepalaBidang, 'profile'=>$this->profile,'sub'=>$this->sub]);
        
    }
}

