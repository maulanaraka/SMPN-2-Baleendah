<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PindahSekolah extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the model name
    protected $table = 'siswa_pindah';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'pindahID';

    // Define the fillable fields
    protected $fillable = [
        'SiswasiswaID',
        'pindahSekolahKe',
        'dariKelas',
        'tanggal',
        'alamatSekolah',
        'alasanPindah',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
