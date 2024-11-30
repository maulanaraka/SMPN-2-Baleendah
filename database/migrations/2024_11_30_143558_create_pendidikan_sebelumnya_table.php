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
        Schema::create('pendidikan_sebelumnya', function (Blueprint $table) {
            $table->increments('sekolahDasarID');
            $table->string('SiswasiswaID', 50); 
            
            $table->string('namaSD', 100); 
            $table->string('alamatSekolah', 255);
            $table->date('tanggalIjazah');
            $table->string('noIjazah', 50);
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
        Schema::dropIfExists('pendidikan_sebelumnya');
    }
};
