<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanSebelumnya extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the model name
    protected $table = 'pendidikan_sebelumnya';

    // Specify the primary key if it's not 'id'
    protected $primaryKey = 'sekolahDasarID';

    // Define the fillable fields
    protected $fillable = [
        'SiswasiswaID',
        'namaSD',
        'alamatSekolah',
        'tanggalIjazah',
        'noIjazah',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }
}
