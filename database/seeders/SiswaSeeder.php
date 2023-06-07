<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Siswa;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();
        $siswa = User::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('password')
        ]);
         Siswa::create([
             'nama' => $siswa->name,
             'user_id'=> $siswa->id,
             'nisn' => '1211515',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'Pria',
             'kelas_id' => '1'
         ]);
        $siswa->assignRole('user');
        
    }
}
