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
    Schema::create('lettercs', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_letterc');
        $table->string('nomor_persil');
        $table->string('nama_pemilik');
        $table->string('luas');
        $table->string('kelas_desa'); // Dropdown (Daratan, Sawah, Bangunan)
        $table->string('jenis_tanah'); // Pilihan (Sawah, Tanah Kering)
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lettercs');
    }
};
