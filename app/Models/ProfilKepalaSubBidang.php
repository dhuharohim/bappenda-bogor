<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKepalaSubBidang extends Model
{
    use HasFactory;
    protected $table = "kepala_sub_bidang";
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'unit_id',
        'fullname',
        'birth_date',
        'handphone',
        'religion',
        'status',
        'absen',
        'email',
        'npwp',
        'nik',
        'kabupaten',
        'kelurahan',
        'kecamatan',
        'alamat_lengkap',
        'posisi_id',
    ];
    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function unit_id()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_id', 'id');
    }
    public function posisi_id()
    {
        return $this->belongsTo(Posisi::class, 'posisi_id', 'id');
    }
}
