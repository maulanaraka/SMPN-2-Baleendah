<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;

    // Define the table name (if it doesn't match the plural of the model name)
    protected $table = 'kesehatan';

    // Define the primary key (if it's not 'id')
    protected $primaryKey = 'kesehatanID';

    // Allow mass assignment for specific columns
    protected $fillable = [
        'SiswasiswaID',
        'beratDiterima',
        'tinggiDiterima',
        'beratLulus',
        'tinggiLulus',
        'golDarah',
        'penyakitKhusus',
    ];

    // Disable timestamps if not using them
    public $timestamps = true;

    // Define the relationship with the siswa table
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
