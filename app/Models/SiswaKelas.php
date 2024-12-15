<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKelas extends Model
{
    use HasFactory;

    // Specify the table name if it's different from the model name
    protected $table = 'siswa_kelas';

    // Use a single primary key
    protected $primaryKey = 'id'; // Ensure your table has an 'id' column as the primary key

    // Disable auto-increment if you're not using an auto-incrementing primary key
    public $incrementing = true;

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'TahunAjaran',
        'SiswasiswaID',
        'KelaskelasID',
    ];

    // Define the relationship with the Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'SiswasiswaID', 'siswaID');
    }

    // Define the relationship with the Kelas model
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'KelaskelasID', 'kelasID');
    }
}
