<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKelas extends Model
{
    use HasFactory;

    protected $table = 'siswa_kelas';
    protected $primaryKey = 'siswaKelasID';
    public $timestamps = true; // Optional, defaults to true

    protected $fillable = [
        'SiswasiswaID',
        'KelaskelasID',
        'TahunAjaran',
        'tanggalMasuk',
        'tanggalKeluar',
        'status',
        'alasanPindah',
    ];

    // Relationships
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'KelaskelasID', 'kelasID');
    }    


    // Scopes
    // public function scopeActive($query)
    // {
    //     return $query->where('status', 'aktif');
    // }
}
