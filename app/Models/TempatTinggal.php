<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTinggal extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'tempat_tinggal';

    // Define the primary key
    protected $primaryKey = 'tempatTinggalID';

    // Disable auto-increment if needed (optional)
    public $incrementing = true;

    // Specify the fillable attributes
    protected $fillable = [
        'SiswasiswaID',
        'jalan',
        'kota',
        'kodePos',
        'provinsi',
        'tinggalBersama',
        'jarakKeSekolah',
        'kendaraan'
    ];

    // If timestamps are not needed, disable them
    public $timestamps = true;

    // Define the relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
