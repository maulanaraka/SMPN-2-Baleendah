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
        Schema::create('intelegensi_dan_kepribadian', function (Blueprint $table) {
            $table->increments('intelegensiID');
            $table->string('SiswasiswaID', 50);

            $table->string('intelegensiIQ', 10); 
            $table->date('tanggalTesIQ'); 
            $table->string('disiplin', 50);
            $table->string('kreativitas', 50);
            $table->string('tanggungJawab', 50);
            $table->string('penyesuaianDiri', 50);
            $table->string('kemantapanEmosi', 50);
            $table->string('kerjasama', 50);

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
        Schema::dropIfExists('intelegensi_dan_kepribadian');
    }
};
