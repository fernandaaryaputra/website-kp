<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkteKematian extends Model
{
    use HasFactory;
    protected $table = 'akte_kematians'; 
    
    // public function akte()
    // {
    //     return $this->belongsTo(Akte::class, 'nik', 'nik');
    // }
}
