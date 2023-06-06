<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'user_id',
        'nipd',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'kelas_id'
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
