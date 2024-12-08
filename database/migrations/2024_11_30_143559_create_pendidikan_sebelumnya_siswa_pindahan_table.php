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
        Schema::create('pendidikan_sebelumnya_siswa_pindahan', function (Blueprint $table) {
            $table->increments('sekolahMenengahPertamaID');
            $table->string('SiswasiswaID', 50);
            
            $table->string('namaSMP', 100); 
            $table->string('alamatSekolah', 255);
            $table->string('diKelas', 10);
            $table->string('alasanPindahKeSekolahIni', 255);
            $table->timestamps();

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
        Schema::dropIfExists('pendidikan_sebelumnya_siswa_pindahan');
    }
};
