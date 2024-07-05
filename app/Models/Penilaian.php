<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'ta_id',
        'jabatan',
        'pembimbing1_id',
        'presentasi_sikap_penampilan',
        'presentasi_komunikasi_sistematika',
        'presentasi_penguasaan_materi',
        'makalah_identifikasi_masalah',
        'makalah_relevansi_teori',
        'makalah_metode_algoritma',
        'makalah_hasil_pembahasan',
        'makalah_kesimpulan_saran',
        'makalah_bahasa_tata_tulis',
        'produk_kesesuaian_fungsional',
        'total_nilai',
        'komentar'
    ];

    public function thesis()
    {
        return $this->belongsTo(Thesis::class, 'ta_id', 'id_ta');
    }

    public function pembimbing1()
    {
        return $this->belongsTo(Lecturer::class, 'pembimbing1_id', 'id_lecturer');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'ta_id', 'ta_id');
    }
    
}
