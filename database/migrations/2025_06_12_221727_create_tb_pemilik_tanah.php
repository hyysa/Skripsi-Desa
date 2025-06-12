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
        Schema::create('tb_pemilik_tanah', function (Blueprint $table) {
            $table->id();

            // Foreign key ke tb_pemilik
            $table->unsignedInteger('id_pemilik');
            $table->foreign('id_pemilik')->references('id_pemilik')->on('tb_pemilik')->onDelete('cascade');

            // Foreign key ke tb_pemetaan
            $table->unsignedInteger('id_pemetaan');
            $table->foreign('id_pemetaan')->references('id_pemetaan')->on('tb_pemetaan')->onDelete('cascade');

            // Foreign key ke users (laravel default table)
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();

            // Agar kombinasi tidak dobel
            $table->unique(['id_pemilik', 'id_pemetaan']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemilik_tanah');
    }
};
