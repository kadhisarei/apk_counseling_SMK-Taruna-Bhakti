<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\HasProfilePhoto;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'user_id',
        'nipd',
        'jenis_kelamin',
        'profile_photo_path',
    ];
 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
