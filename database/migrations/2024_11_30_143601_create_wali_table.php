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
        Schema::create('wali', function (Blueprint $table) {
            $table->increments('waliID');
            $table->string('SiswasiswaID', 50);
            
            $table->string('namaWali', 255); 
            $table->string('nomorTeleponWali', 25); 
            $table->string('tempatLahirWali', 50);
            $table->date('tanggalLahirWali');
            $table->string('kewarganegaraanWali', 50);
            $table->string('pendidikanTertinggiWali', 25);
            $table->string('pekerjaanWali', 50);
            $table->float('penghasilanWali', 20);
            $table->string('alamatWali', 255);
            $table->string('hubunganDenganSiswa', 50);

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
        Schema::dropIfExists('wali');
    }
};
