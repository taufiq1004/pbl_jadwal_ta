<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidasiTa extends Model
{
    protected $table = 'validasi_ta';
    protected $primaryKey = 'id_validasi';
    protected $fillable = ['ta_id', 'komentar', 'status'];

    public function thesis()
    {
        return $this->belongsTo(Thesis::class, 'ta_id', 'id_ta');
    }
    public $timestamps = false;
}
