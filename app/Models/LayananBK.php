<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananBK extends Model
{
    use HasFactory;

    protected $table = 'layanan_bk';

    protected $fillable = [
        'jenis_layanan'
    ];

    public function siswas() {
        return $this->hasMany(Siswa::class);
    }
    public function konseling() {
        return $this->belongsToMany(SiswaKonseling::class);
    }

    

}
