<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otonom extends Model
{
    protected $table = 'otonom';

    protected $fillable = ['otonom_nama', 'kategori_ket',];
}
