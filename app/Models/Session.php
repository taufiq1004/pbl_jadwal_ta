<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_session',
        'nim_student',
        'ta_id',
        'ketua_sidang' ,
        'sekretaris',
        'anggota',
        'no_room',
        'sesi',
        'date_session',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'sessions';

    // Disable timestamps
    public $timestamps = false;

}
