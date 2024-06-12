<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'sesi',                                                                                                        
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'sesi';

    // Disable timestamps
    public $timestamps = false;    
}
