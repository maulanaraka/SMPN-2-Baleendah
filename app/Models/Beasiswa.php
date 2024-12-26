<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';
    protected $primaryKey = 'beasiswaID';
    protected $fillable = ['SiswasiswaID', 'penyelenggara', 'deskripsi', 'tahun'];

    // Relationship to the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
