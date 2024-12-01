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
        Schema::create('tempat_tinggal', function (Blueprint $table) {
            $table->increments('tempatTinggalID');
            $table->string('SiswasiswaID', 50); 
            
            $table->string('jalan', 100);
            $table->string('kodePos', 100);
            $table->string('provinsi', 100);
            $table->string('tinggalBersama', 100);
            $table->integer('jarakKeSekolah');
            $table->string('kendaraan', 100);
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
        Schema::dropIfExists('tempat_tinggal');
    }
};
