<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ta',
        'student_id',
        'judul',
        'tgl_pengajuan',
        'file',
        'file_name',
        'pembimbing1',
        'pembimbing2',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'thesis';

    // Disable timestamps
    public $timestamps = false;
}
