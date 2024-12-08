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
        Schema::create('kesehatan', function (Blueprint $table) {
            $table->increments('kesehatanID');
            $table->string('SiswasiswaID', 50);
            
            $table->float('beratDiterima');
            $table->float('tinggiDiterima');
            $table->float('beratLulus')->nullable();
            $table->float('tinggiLulus')->nullable();
            $table->string('golDarah', 10);
            $table->string('penyakitKhusus', 255)->nullable();
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
        Schema::dropIfExists('kesehatan');
    }
};
