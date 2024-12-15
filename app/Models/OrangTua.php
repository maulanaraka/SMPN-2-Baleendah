<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the model name
    protected $table = 'orang_tua';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'orangTuaID';

    // Define the fillable fields
    protected $fillable = [
        'SiswasiswaID',
        'namaIbu',
        'nomorTeleponIbu',
        'tempatLahirIbu',
        'tanggalLahirIbu',
        'kewarganegaraanIbu',
        'pendidikanTertinggiIbu',
        'pekerjaanIbu',
        'penghasilanIbu',
        'alamatIbu',
        'namaAyah',
        'nomorTeleponAyah',
        'tempatLahirAyah',
        'tanggalLahirAyah',
        'kewarganegaraanAyah',
        'pendidikanTertinggiAyah',
        'pekerjaanAyah',
        'penghasilanAyah',
        'alamatAyah',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
