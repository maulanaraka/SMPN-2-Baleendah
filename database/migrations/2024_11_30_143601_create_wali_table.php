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
            $table->increments('waliID')->nullable();
            $table->string('SiswasiswaID', 50)->nullable();
            
            $table->string('namaWali', 255)->nullable(); 
            $table->string('nomorTeleponWali', 25)->nullable(); 
            $table->string('tempatLahirWali', 50)->nullable();
            $table->date('tanggalLahirWali')->nullable();
            $table->string('kewarganegaraanWali', 255)->nullable();
            $table->string('pendidikanTertinggiWali', 255)->nullable();
            $table->string('pekerjaanWali', 255)->nullable();
            $table->float('penghasilanWali', 20)->nullable();
            $table->string('alamatWali', 255)->nullable();
            $table->string('hubunganDenganSiswa', 50)->nullable();
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
        Schema::dropIfExists('wali');
    }
};
