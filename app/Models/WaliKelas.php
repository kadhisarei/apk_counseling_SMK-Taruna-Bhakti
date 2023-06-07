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
        'nisn',
        'alamat',
        'jenis_kelamin',
        'kelas_id'
    ];
}
