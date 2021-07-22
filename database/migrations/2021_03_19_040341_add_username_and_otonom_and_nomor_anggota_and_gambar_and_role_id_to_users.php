<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameAndOtonomAndNomorAnggotaAndGambarAndRoleIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 225)->after('email')->nullable();
            $table->integer('otonom_id')->after('username')->nullable();
            $table->string('nomor_anggota', 225)->after('otonom_id')->nullable();
            $table->string('gambar', 225)->after('nomor_anggota')->nullable();
            $table->integer('role_id')->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'otonom_id', 'nomor_anggota', 'gambar', 'role_id']);
        });
    }
}
