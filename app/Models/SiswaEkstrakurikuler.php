<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaEkstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'siswa_ekstrakurikuler';
    protected $primaryKey = 'siswaEkstrakurikulerID';

    protected $fillable = [
        'SiswasiswaID',
        'EkstrakurikulerekstrakurikulerID',
        'nilai',
        'keterangan',
        'semester',
        'tahunAjaran',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class, 'EkstrakurikulerekstrakurikulerID', 'ekstrakurikulerID');
    }
}
