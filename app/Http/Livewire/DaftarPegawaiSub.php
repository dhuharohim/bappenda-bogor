<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use App\Models\ProfilKepalaSubBidang;
use App\Models\SubUnit;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DaftarPegawaiSub extends Component
{
    public $user_id;
    public $sub;
    public $profile;
    public $profile_kepalaSubBidang;
    public function render()
    {
        $this->user_id = Auth::user()->id;
        $this->sub = SubUnit::where('id', session('sub_id'))->first();
        $this->profile = Profile::join('users','users.id','=','profile.user_id')
        ->join('unit_kerja','unit_kerja.id','=','profile.unit_id')
        ->join('posisi','posisi.id','=','profile.posisi_id')
        ->join('sub_unit','sub_unit.id','=','profile.sub_id')
        ->where('profile.sub_id', $this->sub->id)
        ->get();
        $this->profile_kepalaSubBidang = ProfilKepalaSubBidang::where('user_id', $this->user_id)->first();
        return view('livewire.daftar-pegawai-sub', ['profile_kepalaSubBidang'=>$this->profile_kepalaSubBidang, 'profile'=>$this->profile,'sub'=>$this->sub]);
    }
}
