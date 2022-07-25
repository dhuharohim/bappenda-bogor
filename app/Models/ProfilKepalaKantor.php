<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilKepalaKantor extends Model
{
    use HasFactory;
    protected $table = "kepala_kantor";
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
    ];
    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
