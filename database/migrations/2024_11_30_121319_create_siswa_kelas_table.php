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
        Schema::create('siswa_kelas', function (Blueprint $table) {
            $table->increments('siswaKelasID');
            $table->string('SiswasiswaID', 50);
            $table->string('KelaskelasID', 50); // Change to match the primary key in kelas
            $table->string('TahunAjaran');
            $table->date('tanggalMasuk');
            $table->date('tanggalKeluar')->nullable();
            $table->enum('status', ['aktif', 'nonaktif']);
            $table->string('alasanPindah')->nullable();
            $table->timestamps();
        
            // Foreign keys
            $table  ->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');
            $table  ->foreign('KelaskelasID')
                    ->references('kelasID')
                    ->on('kelas');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_kelas');
    }
};

