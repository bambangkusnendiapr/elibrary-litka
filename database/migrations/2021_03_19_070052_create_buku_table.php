<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('buku_kode', 225)->nullable();
            $table->string('buku_judul', 225);
            $table->integer('pengarang_id')->nullable();
            $table->integer('kategori_id')->nullable();
            $table->integer('penerbit')->nullable();
            $table->date('buku_tahun')->nullable();
            $table->string('buku_halaman', 11)->nullable();
            $table->string('buku_kota', 225)->nullable();
            $table->string('buku_file', 225)->nullable();
            $table->integer('buku_jumlah')->nullable();
            $table->string('buku_gambar', 225)->nullable();
            $table->string('buku_ket', 225)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
