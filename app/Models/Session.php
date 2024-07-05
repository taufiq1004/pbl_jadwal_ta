<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_session',
        'ta_id',
        'ketua_sidang' ,
        'sekretaris',
        'penguji1',
        'penguji2',
        'no_room',
        'date_session',
        // Add any other attributes that you want to be mass assignable
    ];

    protected $table = 'sessions';

    // Disable timestamps
    public $timestamps = false;

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'ta_id', 'ta_id'); // Sesuaikan dengan kunci asing dan primer yang benar
    }

public function thesis()
{
    return $this->belongsTo(Thesis::class, 'ta_id', 'id_ta');

}
public function rooms()
{
    return $this->belongsTo(Room::class, 'no_room','id_room');
}

public function penilaianKetuaSidang()
    {
        return $this->hasMany(Penilaian::class, 'pembimbing1_id', 'ketua_sidang');
    }

    public function penilaianPenguji1()
    {
        return $this->hasMany(Penilaian::class, 'pembimbing1_id', 'penguji1');
    }

    public function penilaianPenguji2()
    {
        return $this->hasMany(Penilaian::class, 'pembimbing1_id', 'penguji2');
    }

    public function penilaianSekretaris()
    {
        return $this->hasMany(Penilaian::class, 'pembimbing1_id', 'sekretaris');
    }

}
