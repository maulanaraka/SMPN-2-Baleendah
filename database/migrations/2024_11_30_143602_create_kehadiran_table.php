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
        Schema::create('kehadiran', function (Blueprint $table) {
            $table->increments('kehadiranID');
            $table->string('SiswasiswaID', 50);

            $table->string('kelas', 10); 
            $table->integer('semester'); 
            $table->integer('jumlahHadir');
            $table->float('presentaseHadir');
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('alpa');
            $table->integer('jumlahTidakHadir');
            $table->float('presentaseTidakHadir');
            $table->integer('jumlahHariBelajarEfektif');

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
        Schema::dropIfExists('kehadiran');
    }
};
