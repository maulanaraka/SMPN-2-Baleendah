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
            // Foreign keys without auto-incrementing IDs
            $table->string('SiswasiswaID', 50);
            $table->unsignedInteger('KelaskelasID');
            $table->string('TahunAjaran');
            $table->timestamps();
        
            // Foreign keys with cascade on delete
            $table  ->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');

            $table  ->foreign('KelaskelasID')
                    ->references('kelasID')
                    ->on('kelas')
                    ->onDelete('cascade');
            
            // Composite primary key for the pivot table
            $table->primary(['SiswasiswaID', 'KelaskelasID']);
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_siswa');
    }
};

