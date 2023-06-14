<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   KonselingBK extends Model
{
    use HasFactory;
    protected $table = 'konseling_bk';

    protected $fillable = [
        'id_layanan',
        'id_bk',
        'id_walas',
        'status',
        'tanggal_konseling',
        'jam_mulai',
        'tempat',
        'pesan',
        'hasil_konseling'
    ];

    public function siswa() {
        return $this->belongsToMany(Siswa::class,'siswa_konseling', 'id_konseling', 'id_siswa', 'id', 'id')->withPivot('id_konseling');
    }
    public function layanan() {
        return $this->belongsTo(LayananBK::class, 'id_layanan');
    }
    public function guru() {
        return $this->belongsTo(Guru::class, 'id_bk','id');
    }
    public function walas() {
        return $this->belongsTo(walas::class, 'id_walas', 'id');
    }

}
