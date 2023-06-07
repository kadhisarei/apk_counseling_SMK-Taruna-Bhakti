<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;


class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = Kelas::create([
            'nama' => 'XI PPLG 1',
        ]);

        $kelas = Kelas::create([
            'nama' => 'XI PPLG 2',
        ]);

        $kelas = Kelas::create([
            'nama' => 'X PPLG', 
        ]);
    }
}
