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
        Schema::create('pengaduan', function (Blueprint $table) {
        $table->string('idpengaduan', 20)->primary(); // Primary Key
        $table->string('nama_fasilitas', 50);
        $table->string('nama_barang', 30);
        $table->string('gambar', 50); // Optional, bisa null
        $table->text('deskripsi_keluhan');
        $table->text('tanggal_aduan')->nullable(); // Optional, bisa null
        $table->string('lokasi');
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
        Schema::dropIfExists('pengaduan');
    }
};
