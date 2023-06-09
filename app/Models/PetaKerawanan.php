<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaKerawanan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'wali_kelas_id',
        'siswa_id',
        'jenis_kerawanan_id'
    ];
}
