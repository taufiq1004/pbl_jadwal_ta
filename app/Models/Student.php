<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_student',
        'nim',
        'name',
        'prodi_id',
        'force',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'students';

    // Disable timestamps
    public $timestamps = false;
}
