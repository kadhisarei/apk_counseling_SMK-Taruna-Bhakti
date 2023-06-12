<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingBK extends Model
{
    use HasFactory;
    protected $table = 'konseling_bk';

    protected $fillable = [
        'id_layanan',
        'id_bk',
        'id_walas',
        'status',
        'tanggal_konseling',
        'hasil_konseling'
    ];

    public function siswa() {
        return $this->belongsToMany(Siswa::class);
    }
}
