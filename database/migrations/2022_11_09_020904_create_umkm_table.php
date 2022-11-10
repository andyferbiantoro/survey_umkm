<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelaku_usaha');
            $table->string('nama_produk');
            $table->string('jenis_usaha');
            $table->string('no_izin');
            $table->integer('harga');
            $table->string('alamat_usaha');
            $table->string('no_hp');
            $table->string('sosial_media');
            $table->string('nama_badan_hukum');
            $table->string('lama_usaha_berjalan');
            $table->integer('kapasitas_produksi');
            $table->string('metode_penjualan');
            $table->string('foto_ktp');
            $table->string('foto_produk');
            $table->string('foto_lokasi_usaha');
            $table->text('kendala_yang_dialami');
            $table->string('longitude');
            $table->string('latitude');
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
        Schema::dropIfExists('umkm');
    }
};
