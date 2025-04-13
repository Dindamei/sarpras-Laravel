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
        Schema::create('cetak_laporan', function (Blueprint $table) {
        $table->string('idlaporan', 20)->primary(); // Primary key
        $table->string('nama_fasilitas', 50);
        $table->string('nama_barang', 30);
        $table->string('gambar', 50)->nullable(); // Optional, bisa null
        $table->text('deskripsi_keluhan');
        $table->text('tanggal_aduan');
        $table->text('lokasi');
        $table->text('tanggapan_aduan');
        $table->text('status_pengaduan');
        $table->text('idpengaduan');
        $table->timestamps(); // created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cetak__laporan');
    }
};
