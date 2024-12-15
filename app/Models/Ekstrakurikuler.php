<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel's naming convention)
    protected $table = 'ekstrakurikuler';

    // The primary key field
    protected $primaryKey = 'ekstrakurikulerID';

    // Disable incrementing for non-integer primary keys (use if the primary key is a UUID)
    public $incrementing = true;

    // Define fillable fields
    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Cast attributes to native types
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optional relationships (e.g., if ekstrakurikuler has students or other relations)
    // public function students()
    // {
    //     return $this->hasMany(Student::class);
    // }
}
