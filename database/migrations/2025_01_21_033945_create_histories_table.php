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
        Schema::create('history', function (Blueprint $table) {
            $table->string('idhistory', 20); 
            $table->string('username', 20); 
            $table->text('aksi'); 
            $table->text('tanggal_diubah');
            $table->text('tanggal_aduan');
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
        Schema::dropIfExists('history');
    }
};
