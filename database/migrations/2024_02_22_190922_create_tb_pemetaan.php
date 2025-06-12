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
        Schema::create('tb_pemetaan', function (Blueprint $table) {
            $table->increments('id_pemetaan')->unique();
            $table->string('blok', 255);
            $table->string('kelas', 255);
            $table->string('persil', 255);
            $table->text('koordinat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pemetaan');
    }
};
