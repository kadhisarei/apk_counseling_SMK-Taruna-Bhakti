<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKonseling extends Model
{
    use HasFactory;

    protected $table = 'siswa_konseling';

    protected $fillable = [
        'id_siswa',
        'id_konseling'
    ];
}
