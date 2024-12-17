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
        'kelas',
        'semester',
        'jumlahHadir',
        'presentaseHadir',
        'sakit',
        'izin',
        'alpa',
        'jumlahTidakHadir',
        'presentaseTidakHadir',
        'jumlahHariBelajarEfektif',
    ];

    // Relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
