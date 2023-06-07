<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function walas()
    {
        return $this->hasMany(Walas::class);
    }

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
