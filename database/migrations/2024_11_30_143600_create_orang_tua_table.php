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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->increments('orangTuaID');
            $table->string('SiswasiswaID', 50);
            
            $table->string('namaIbu', 255); 
            $table->string('nomorTeleponIbu', 25); 
            $table->string('tempatLahirIbu', 50);
            $table->date('tanggalLahirIbu');
            $table->string('kewarganegaraanIbu', 50);
            $table->string('pendidikanTertinggiIbu', 25);
            $table->string('pekerjaanIbu', 50);
            $table->float('penghasilanIbu', 20);
            $table->string('alamatIbu', 255);

            $table->string('namaAyah', 255); 
            $table->string('nomorTeleponAyah', 25); 
            $table->string('tempatLahirAyah', 50);
            $table->date('tanggalLahirAyah');
            $table->string('kewarganegaraanAyah', 50);
            $table->string('pendidikanTertinggiAyah', 25);
            $table->string('pekerjaanAyah', 50);
            $table->float('penghasilanAyah', 20);
            $table->string('alamatAyah', 255);
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
        Schema::dropIfExists('orang_tua');
    }
};
