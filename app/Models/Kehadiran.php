<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadiran'; // Specify the table name
    protected $primaryKey = 'kehadiranID'; // Primary key

    public $timestamps = false; // Since there are no created_at or updated_at columns

    // Fillable fields for mass assignment
    protected $fillable = [
        'SiswasiswaID',
        'siswa_kelassiswaKelasID',
        'semester',
        'jumlahHadir',
        'presentaseHadir',
        'sakit',
        'izin',
        'alpa',
        'presentaseTidakHadir',
        'jumlahHariBelajarEfektif'
    ];

    // Relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
    public function siswa_kelas()
    {
        return $this->belongsTo(SiswaKelas::class, 'siswa_kelassiswaKelasID', 'siswaKelasID');
    }

    /**
     * Accessor for jumlahTidakHadir.
     * This dynamically calculates the jumlahTidakHadir when retrieving the data.
     */
    public function getJumlahTidakHadirAttribute()
    {
        return $this->izin + $this->sakit + $this->alpa;
    }

    /**
     * Automatically calculate jumlahTidakHadir when saving the model.
     */
    protected static function booted()
    {
        static::saving(function ($kehadiran) {
            // Calculate jumlahTidakHadir before saving
            $kehadiran->jumlahTidakHadir = $kehadiran->izin + $kehadiran->sakit + $kehadiran->alpa;
        });
    }
}
