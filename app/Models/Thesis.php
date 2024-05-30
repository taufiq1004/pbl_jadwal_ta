<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ta',
        'nim_student',
        'judul',
        'tgl_pengajuan',
        'file',
        'file_name',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'thesis';

    // Disable timestamps
    public $timestamps = false;
}
