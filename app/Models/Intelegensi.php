<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intelegensi extends Model
{
    use HasFactory;

    protected $table = 'intelegensi_dan_kepribadian';

    protected $primaryKey = 'intelegensiID';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'SiswasiswaID',
        'intelegensiIQ',
        'tanggalTesIQ',
        'disiplin',
        'kreativitas',
        'tanggungJawab',
        'penyesuaianDiri',
        'kemantapanEmosi',
        'kerjasama',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
