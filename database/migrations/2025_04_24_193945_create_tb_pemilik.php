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
        Schema::create('tb_pemilik', function (Blueprint $table) {
            $table->increments('id_pemilik')->unique();
            $table->string('nama_pemilik');
            $table->integer('luas');
            $table->integer('nomor_letterc');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemilik');
    }
};
