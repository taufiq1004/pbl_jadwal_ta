<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_room',
        'no_room',                                                      
        'times',                                                      
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'rooms';

    // Disable timestamps
    public $timestamps = false;
}
