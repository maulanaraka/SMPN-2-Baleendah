<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the model name
    protected $table = 'wali';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'waliID';

    // Define the fillable fields
    protected $fillable = [
        'SiswasiswaID',
        'namaWali',
        'nomorTeleponWali',
        'tempatLahirWali',
        'tanggalLahirWali',
        'kewarganegaraanWali',
        'pendidikanTertinggiWali',
        'pekerjaanWali',
        'penghasilanWali',
        'alamatWali',
        'hubunganDenganSiswa',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}