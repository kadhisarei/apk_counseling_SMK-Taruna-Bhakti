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
}
