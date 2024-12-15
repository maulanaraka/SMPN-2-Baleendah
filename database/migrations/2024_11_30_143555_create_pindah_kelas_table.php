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
        Schema::create('pindah_kelas', function (Blueprint $table) {
            $table->increments('pindahKelasID');
            $table->string('Siswa_KelasSiswasiswaID', 50);
            $table->unsignedInteger('Siswa_KelasKelaskelasID');

            $table->integer('kelasIDAwal');
            $table->integer('kelasIDAkhir');
            $table->timestamps();

            // foreign key
            $table  ->foreign('Siswa_KelasSiswasiswaID')
                    ->references('SiswasiswaID')
                    ->on('siswa_kelas')
                    ->onDelete('cascade');
            $table  ->foreign('Siswa_KelasKelaskelasID')
                    ->references('KelaskelasID')
                    ->on('siswa_kelas')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pindah_kelas');
    }
};
