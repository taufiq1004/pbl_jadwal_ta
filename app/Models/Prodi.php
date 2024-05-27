<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prodi',
        'name_prodi',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'prodis';

    // Disable timestamps
    public $timestamps = false;
}
