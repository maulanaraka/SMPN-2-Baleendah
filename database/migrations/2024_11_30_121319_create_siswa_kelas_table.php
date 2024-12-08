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
            $table->string('SiswasiswaID', 50);
            $table->unsignedInteger('KelaskelasID');
            $table->timestamps();
        
            // foreign key
            $table  ->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');
            $table  ->foreign('KelaskelasID')
                    ->references('kelasID')
                    ->on('kelas')
                    ->onDelete('cascade');
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
