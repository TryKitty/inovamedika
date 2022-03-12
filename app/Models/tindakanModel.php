<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tindakanModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'tindakan','keluhan','pasien_id','obat_id'
    ];
}
