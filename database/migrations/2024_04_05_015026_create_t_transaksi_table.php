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
        Schema::create('t_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_barang')->index();
            $table->unsignedBigInteger('id_user')->index();
            $table->integer('barang_masuk')->nullable();
            $table->integer('barang_keluar')->nullable();
            $table->datetime('tgl_transaksi');
            $table->string('status', 50);
            $table->timestamps();

            $table->foreign('id_barang')->references('id_barang')->on('m_barang');
            $table->foreign('id_user')->references('id_user')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi');
    }
};
