<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkstrakurikulerSiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa_ekstrakurikuler';
    protected $primaryKey = 'siswaEkstrakurikulerID';
    public $incrementing = true;
    protected $fillable = [
        'SiswasiswaID',
        'EkstrakurikulerekstrakurikulerID',
        'nilai',
        'keterangan',
        'semester',
        'created_at',
        'updated_at',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID');
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'EkstrakurikulerekstrakurikulerID');
    }
}
