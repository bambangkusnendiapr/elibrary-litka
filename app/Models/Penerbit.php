<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbit';

    protected $fillable = ['penerbit_nama', 'penerbit_kota', 'penerbit_ket',];
}
