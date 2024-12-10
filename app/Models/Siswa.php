<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Define the table name
    protected $primaryKey = 'siswaID'; // Define the primary key
    public $incrementing = false; // Since siswaID is not auto-incrementing
    protected $keyType = 'string'; // Since siswaID is a string
    protected $casts = ['tanggalLahir' => 'datetime',]; // This ensures tanggalLahir is a Carbon instance    
    protected $fillable = [
        'siswaID',
        'NISN',
        'namaLengkap',
        'namaPanggilan',
        'jenisKelamin',
        'tempatLahir',
        'tanggalLahir',
        'agama',
        'kewarganegaraan',
        'anakKe',
        'saudaraKandung',
        'saudaraTiri',
        'saudaraAngkat',
        'yatimPiatu',
        'bahasaDirumah',
    ];
}
