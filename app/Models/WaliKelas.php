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
<<<<<<< HEAD
        'nisn',
=======
        'nipd',
>>>>>>> e9599e4f8ca22aa2b5d98fc3c94b0b2fd9bcb140
        'alamat',
        'jenis_kelamin',
        'kelas_id'
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
