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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('siswaID', 50)->primary();
            $table->string('NISN', 50)->unique();
            $table->string('namaLengkap', 255);
            $table->string('namaPanggilan', 50);
            $table->string('jenisKelamin', 10);
            $table->string('tempatLahir', 50);
            $table->date('tanggalLahir');
            $table->string('agama', 50);
            $table->string('kewarganegaraan', 50);
            $table->integer('anakKe', 50);
            $table->integer('saudaraKandung', 5);
            $table->integer('saudaraTiri', 5);
            $table->integer('saudaraAngkat', 5);
            $table->string('yatimPiatu', 10);
            $table->string('bahasaDirumah', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
