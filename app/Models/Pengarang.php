<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $table = 'pengarang';

    protected $fillable = ['pengarang_nama', 'pengarang_ket',];
}
