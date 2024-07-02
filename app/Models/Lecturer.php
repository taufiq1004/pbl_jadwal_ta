<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
         'id_lecturer','nidn', 'name', 'gender', 'email'
    ];
    protected $table = 'lecturers';

    public $timestamps = false;
}
