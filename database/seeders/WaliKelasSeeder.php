<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = User::create([
            'name' => 'wali kelas',
            'email' => 'walikelas@gmail.com',
            'password' => bcrypt('password')
        ]);
        $siswa->assignRole('wali kelas');
    }
}
