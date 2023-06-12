<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'guru_id',
        'wali_kelas_id'
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function wali_kelas()
    {
        return $this->belongsTo(WaliKelas::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
