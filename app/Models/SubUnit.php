<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubUnit extends Model
{
    use HasFactory;
    protected $table = "sub_unit";
    public $timestamps = false;

    protected $fillable = [
        'name_sub',
    ];
}
