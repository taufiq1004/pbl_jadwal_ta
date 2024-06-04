<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailThesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_detailta', 'nim_student', 'ta_id', 'pembimbing1','pembimbing2'
   ];
   protected $table = 'detail_thesis';

   public $timestamps = false;
}
