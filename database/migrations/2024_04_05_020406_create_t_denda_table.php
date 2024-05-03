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
        Schema::create('t_denda', function (Blueprint $table) {
            $table->id('id_denda');
            $table->unsignedBigInteger('id_pengembalian')->index();
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('id_pengembalian')->references('id_pengembalian')->on('t_pengembalian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_denda');
    }
};
