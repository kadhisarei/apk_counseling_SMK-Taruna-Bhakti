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
            'name' => 'Ricky',
            'email' => 'Ricky@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '085685274',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'Pria'
        ]);
        $guru_bk->assignRole('guru bk');

        //2 
        $guru_bk = User::create([
            'name' => 'Heni',
            'email' => 'heni@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0855698',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'perempuan'
        ]);
        $guru_bk->assignRole('guru bk');

        // 3
        $guru_bk = User::create([
            'name' => 'Abdul',
            'email' => 'abduly@gmail.com',
            'password' => bcrypt('password')
        ]);
        Guru::create([
            'nipd' => '0854587',
            'nama' => $guru_bk->name,
            'user_id' => $guru_bk->id,
            'jenis_kelamin'=> 'Pria'
        ]);
        $guru_bk->assignRole('guru bk');
        
    }
}
