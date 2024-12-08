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
        Schema::create('siswa_pindah', function (Blueprint $table) {
            $table->increments('pindahID');
            $table->string('SiswasiswaID', 50);

            $table->string('pindahSekolahKe', 255); 
            $table->string('dariKelas', 10); 
            $table->date('tanggal');
            $table->string('alamatSekolah', 255);
            $table->string('alasanPindah', 255);

            // foreign key
            $table  ->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_pindah');
    }
};
