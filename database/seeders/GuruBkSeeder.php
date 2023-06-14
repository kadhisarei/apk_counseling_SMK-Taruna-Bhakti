<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guru;


class GuruBkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru_bk = User::create([
            'name' => 'Ricky Sudrajat',
            'email' => 'Ricky@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0018575',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'Pria'
        ]);
        $guru_bk->assignRole('guru bk');

        //2 
        $guru_bk = User::create([
            'name' => 'Heni Putri',
            'email' => 'heni@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0018580',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'perempuan'
        ]);
        $guru_bk->assignRole('guru bk');

        // 3
        $guru_bk = User::create([
            'name' => 'Abdul Fatah',
            'email' => 'abduly@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0018585',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'Pria'
        ]);
        $guru_bk->assignRole('guru bk');

        $guru_bk = User::create([
            'name' => 'Sheyla putri',
            'email' => 'sheyla@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0018790',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'Perempuan'
        ]);
        $guru_bk->assignRole('guru bk');
        
    }
}
