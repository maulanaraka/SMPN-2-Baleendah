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
        Schema::create('mata_pelajaran_siswa', function (Blueprint $table) {
            $table->string('SiswasiswaID', 50);
            $table->unsignedInteger('MataPelajaranmataPelajaranID');

            $table->float('nilaiPengetahuan');
            $table->string('predikatPengetahuan', 5);
            $table->string('deskripsiPengetahuan', 255);
            
            $table->float('nilaiKeterampilan');
            $table->string('predikatKeterampilan', 5);
            $table->string('deskripsiKeterampilan', 255);
            
            $table->integer('semester');
            $table->timestamps();
        
            // foreign key
            $table  ->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');
            $table  ->foreign('MataPelajaranmataPelajaranID')
                    ->references('mataPelajaranID')
                    ->on('mata_pelajaran')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajaran_siswa');
    }
};
