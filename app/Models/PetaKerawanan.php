<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaKerawanan extends Model
{
    use HasFactory;
    protected $table = 'peta_kerawanan';

    
    protected $fillable = [
        'wali_kelas_id',
        'siswa_id',
        'kesimpulan',
        'jenis_kerawanan'
    ];
    public function walikelas()
    {
        return $this->belongsTo(WaliKelas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

}
