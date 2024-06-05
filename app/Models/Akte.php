<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akte extends Model
{
    use HasFactory;
    protected $table = 'akte';

    // public function akte_kematians()
    // {
    //     return $this->hasMany(AkteKematian::class, 'nik', 'nik');
    // }
}
