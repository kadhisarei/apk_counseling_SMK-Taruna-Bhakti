<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerawanan extends Model
{
    use HasFactory;
    protected $table = 'jenis_kerawanan';
    protected $fillable = [
        'jenis_kerawanan'
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'kerawanan', 'jenis_kerawanan_id', 'siswa_id');
    }
}
