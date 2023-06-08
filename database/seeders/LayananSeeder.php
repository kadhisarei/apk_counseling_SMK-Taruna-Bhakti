<?php

namespace Database\Seeders;

use App\Models\LayananBK;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_layanan = LayananBK::create([
            'jenis_layanan' => 'Bimbingan Pribadi'
        ]);
        $jenis_layanan = LayananBK::create([
            'jenis_layanan' => 'Bimbingan Sosial'
        ]);
        $jenis_layanan = LayananBK::create([
            'jenis_layanan' => 'Bimbingan Karir'
        ]);
        $jenis_layanan = LayananBK::create([
            'jenis_layanan' => 'Bimbingan Belajar'
        ]);
    }
}
