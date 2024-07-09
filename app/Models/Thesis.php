<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ta',
        'nim',
        'nama',
        'judul',
        'tgl_pengajuan',
        'file',
        'file_name',
        'dokumen_pkl',
        'proposal',
        'lembar_bimbingan',
        'pembimbing1',
        'pembimbing2',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'thesis';

    // Disable timestamps
    public $timestamps = false;

    public function validasi()
    {
        return $this->hasOne(ValidasiTa::class, 'ta_id', 'id_ta');
    }
}
