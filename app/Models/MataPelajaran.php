<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'mata_pelajaran';

    // The primary key field
    protected $primaryKey = 'mataPelajaranID';

    // Disable incrementing for non-integer primary keys
    public $incrementing = true;

    // Define fillable fields
    protected $fillable = [
        'mataPelajaran',
        'deskripsiMataPelajaran',
        'KKMPengetahuan',
        'KKMKeterampilan',
        'tingkat',
    ];

    // Cast attributes to native types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function siswaMataPelajaran()
    {
        return $this->hasMany(MataPelajaranSiswa::class, 'MataPelajaranmataPelajaranID', 'mataPelajaranID');
    }    

    // Optional relationships (e.g., if mata_pelajaran has students or classes)
    // public function classes()
    // {
    //     return $this->hasMany(Kelas::class);
    // }
}

