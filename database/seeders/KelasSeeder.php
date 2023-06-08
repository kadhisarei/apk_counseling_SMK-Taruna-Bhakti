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
            'wali_kelas_id' => '1',
            'guru_id' => '1',
        ]);

        $kelas = Kelas::create([
            'nama' => 'XI PPLG 2',
            'wali_kelas_id' => '2',
            'guru_id' => '2',
        ]);

        $kelas = Kelas::create([
            'nama' => 'X PPLG 1',
            'wali_kelas_id' => '3',
            'guru_id' => '3',
        ]);
    }
}
