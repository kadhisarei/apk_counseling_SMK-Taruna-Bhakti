<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WaliKelas;

class WaliKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $walas = User::create([
            'name' => 'wali kelas',
            'email' => 'walikelas@gmail.com',
            'password' => bcrypt('password')
        ]);
        WaliKelas::create([
            'nipd' => '0856852',
            'nama' => $walas->name,
            'user_id' => $walas->id,
            'jenis_kelamin'=> 'perempuan'
        ]);
        $walas->assignRole('wali kelas');

        // 2
        $walas = User::create([
            'name' => 'Nahla Naudan',
            'email' => 'Nahla@gmail.com',
            'password' => bcrypt('password')
        ]);
        WaliKelas::create([
            'nipd' => '0856984',
            'nama' => $walas->name,
            'user_id' => $walas->id,
            'jenis_kelamin'=> 'perempuan'
        ]);
        $walas->assignRole('wali kelas');

        // 3 

        $walas = User::create([
            'name' => 'Dani Aditya',
            'email' => 'dani@gmail.com',
            'password' => bcrypt('password')
        ]);
        WaliKelas::create([
            'nipd' => '08565682',
            'nama' => $walas->name,
            'user_id' => $walas->id,
            'jenis_kelamin'=> 'perempuan'
        ]);
        $walas->assignRole('wali kelas');


    }
}
