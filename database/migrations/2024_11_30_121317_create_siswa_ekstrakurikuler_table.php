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
        Schema::create('siswa_ekstrakurikuler', function (Blueprint $table) {
            $table->increments('siswaEkstrakurikulerID');
            $table->string('SiswasiswaID', 50);
            $table->unsignedInteger('EkstrakurikulerekstrakurikulerID');
            $table->integer('nilai')->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->integer('semester')->nullable();
            $table->string('tahunAjaran', 10);
            $table->timestamps();
        
            // foreign keys
            $table->foreign('SiswasiswaID')
                    ->references('siswaID')
                    ->on('siswa')
                    ->onDelete('cascade');
            $table->foreign('EkstrakurikulerekstrakurikulerID')
                    ->references('ekstrakurikulerID')
                    ->on('ekstrakurikuler');
        });           
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Siswa_Ekstrakurikuler');
    }
};
