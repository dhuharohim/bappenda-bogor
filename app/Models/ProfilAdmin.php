<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilAdmin extends Model
{
    use HasFactory;
    protected $table = "profile_admin";
    public $timestamps = false;

    protected $fillable = [
        'user_id',
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
        'unit_kerja',
        'posisi',
    ];
    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
