<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('barang_temuans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->dateTime('waktu_ditemukan');
            $table->string('penemu');
            $table->string('lokasi_ditemukan');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_temuans');
    }
};
