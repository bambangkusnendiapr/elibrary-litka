<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    public function pengarang() {
		return $this->belongsTo('\App\Models\Pengarang', 'pengarang_id');
	}

    public function kategori() {
		return $this->belongsTo('\App\Models\Kategori', 'kategori_id');
	}

    public function penerbit() {
		return $this->belongsTo('\App\Models\Penerbit', 'penerbit_id');
	}
}
