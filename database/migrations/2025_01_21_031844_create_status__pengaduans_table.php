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
        Schema::create('status__pengaduan', function (Blueprint $table) {
            $table->string('idstatus', 20)->primary(); // Primary key
            $table->string('nama_fasilitas', 50);
            $table->string('nama_barang', 30);
            $table->string('gambar', 50)->nullable(); // Optional, bisa null
            $table->text('deskripsi_keluhan');
            $table->text('tanggal_aduan');
            $table->text('lokasi');
            $table->text('tanggapan_aduan');
            $table->string('status_pengaduan', 20);
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
        Schema::dropIfExists('status__pengaduan');
    }
};
