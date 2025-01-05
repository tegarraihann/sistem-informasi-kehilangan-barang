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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_temuan_id'); // ID barang yang diklaim
            $table->string('nama_lengkap');
            $table->string('npm');
            $table->string('no_hp');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->string('status')->default('Menunggu');
            $table->text('pesan')->nullable(); // Tambahkan kolom pesan
            $table->timestamps();

            // Relasi ke tabel users dan barang_temuan
            $table->foreign('barang_temuan_id')->references('id')->on('barang_temuans')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
