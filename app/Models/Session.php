<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim_student',
        'ta_id',
        'pembimbing1',
        'pembimbing2',
        'ketua_sidang' ,
        'sekretaris',
        'penguji1',
        'penguji2',
        'no_room',
        'date_session',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'session';

    // Disable timestamps
    public $timestamps = false;

}
