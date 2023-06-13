<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $table = 'wali_kelas';

    protected $fillable = [
        'nama',
        'user_id',
        'nipd',
        'jenis_kelamin',
    ];
    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function siswas(){
        return $this->hasMany(Siswa::class);
    }
}
