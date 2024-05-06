<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillabel = [
         'id_lecturer','nidn', 'name', 'email', 'position', 'prodi'
    ];
    protected $table ='lecturer';

}
