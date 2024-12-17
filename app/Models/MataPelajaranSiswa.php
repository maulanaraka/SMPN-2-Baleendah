<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaranSiswa extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran_siswa'; // Specify the table name
    protected $primaryKey = 'mataPelajaranSiswaID'; // Primary key for the table
    public $incrementing = true; // Enable auto-increment for the primary key
    protected $fillable = [
        'SiswasiswaID',
        'MataPelajaranmataPelajaranID',
        'siswa_kelassiswaKelasID',
        'nilaiPengetahuan',
        'predikatPengetahuan',
        'deskripsiPengetahuan',
        'nilaiKeterampilan',
        'predikatKeterampilan',
        'deskripsiKeterampilan',
        'semester',
    ];

    /**
     * Define the relationship with the Siswa model
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }

    /**
     * Define the relationship with the MataPelajaran model
     */
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'MataPelajaranmataPelajaranID', 'mataPelajaranID');
    }

    /**
     * Define the relationship with the SiswaKelas model
     */
    public function siswaKelas()
    {
        return $this->belongsTo(SiswaKelas::class, 'siswa_kelassiswaKelasID', 'siswaKelasID');
    }
}