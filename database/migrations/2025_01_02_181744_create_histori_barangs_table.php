<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('histori_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->datetime('waktu_ditemukan');
            $table->string('penemu');
            $table->timestamps();
            $table->unsignedBigInteger('klaim_id')->nullable();

            $table->foreign('klaim_id')->references('id')->on('claims')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('histori_barangs');
    }
};
