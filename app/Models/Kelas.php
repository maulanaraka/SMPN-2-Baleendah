<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'kelas';

    // Primary key
    protected $primaryKey = 'kelasID';
    public $incrementing = false;

    // Define fillable fields
    protected $fillable = [
        'kelasID',
        'tingkat',
    ];

    // Cast attributes to native types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class, 'KelaskelasID', 'kelasID');
    }
}



