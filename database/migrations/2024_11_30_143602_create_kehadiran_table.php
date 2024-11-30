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
            $table->integer('semester', 10); 
            $table->integer('jumlahHadir', 10);
            $table->float('presentaseHadir', 10);
            $table->integer('sakit', 10);
            $table->integer('izin', 10);
            $table->integer('alpa', 10);
            $table->integer('jumlahTidakHadir', 10);
            $table->float('presentaseTidakHadir', 10);
            $table->integer('jumlahHariBelajarEfektif', 10);

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
