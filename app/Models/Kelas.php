<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'kelas';

    // The primary key field
    protected $primaryKey = 'kelasID';

    // Disable incrementing for non-integer primary keys
    public $incrementing = true;

    // Define fillable fields
    protected $fillable = [
        'kelas',
        'tingkat',
    ];

    // Cast attributes to native types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function siswaKelas()
    {
        return $this->hasOne(SiswaKelas::class, 'SiswasiswaID', 'siswaID');
    }
}


