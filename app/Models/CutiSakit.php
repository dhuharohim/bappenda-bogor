<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiSakit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'date_sick',
        'keterangan_sakit',
        'docs_sick'
    ];
}
