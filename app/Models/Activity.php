<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = "activity";
    public $timestamps = false;

    protected $fillable = [
        'date_act',
        'desc_act',
        'output_act',
        'quantitiy_act',
        'time_act',
        'docs_act',
        'quant_desc'
    ];
    public function user_id()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function unit_id()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_id', 'id');
    }
}
