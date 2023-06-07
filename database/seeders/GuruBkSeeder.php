<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class GuruBkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $walikelas = User::create([
            'name' => 'guru bk',
            'email' => 'gurubk@gmail.com',
            'password' => bcrypt('password')
        ]);
        $walikelas->assignRole('guru bk');
    }
}
