<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'user_id',
        'nisn',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas_id',
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kerawanan()
    {
        return $this->hasMany(PetaKerawanan::class);
    }
    
    public function konseling()
    {
        return $this->belongsToMany(KonselingBK::class,'siswa_konseling','id_siswa','id_konseling','id','id');
    }

}

