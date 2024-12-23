<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiSiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa_prestasi';
    protected $primaryKey = 'PrestasiprestasiID';
    public $incrementing = false;
    protected $fillable = [
        'SiswasiswaID',
        'PrestasiprestasiID',
        'created_at',
        'updated_at',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID');
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class, 'PrestasiprestasiID');
    }
}
