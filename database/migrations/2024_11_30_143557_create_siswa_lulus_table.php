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
        Schema::create('siswa_lulus', function (Blueprint $table) {
            $table->increments('lulusID');
            $table->string('SiswasiswaID', 50); 
            
            $table->string('noIjazah', 50)->nullable(); 
            $table->date('tanggal')->nullable();
            $table->string('melanjutkanSekolahKe', 255)->nullable();
            $table->string('alamatSekolah', 255)->nullable();
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
        Schema::dropIfExists('siswa_lulus');
    }
};
