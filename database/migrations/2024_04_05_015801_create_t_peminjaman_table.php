<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_barang')->index();
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_user')->index();
            $table->datetime('tgl_pinjam');
            $table->datetime('tgl_tenggat');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('m_barang');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa');
            $table->foreign('id_user')->references('id_user')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_peminjaman');
    }
};
