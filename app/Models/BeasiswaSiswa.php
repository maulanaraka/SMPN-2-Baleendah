<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeasiswaSiswa extends Model
{
    use HasFactory;

    protected $table = 'siswa_beasiswa';
    protected $primaryKey = 'BeasiswabeasiswaID';
    public $incrementing = false;
    protected $fillable = [
        'SiswasiswaID',
        'BeasiswabeasiswaID',
        'created_at',
        'updated_at',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'BeasiswabeasiswaID');
    }
}
