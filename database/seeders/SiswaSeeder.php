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
             'nisn' => '15632',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'Pria',
             'kelas_id' => '1'
         ]);
        $siswa->assignRole('user');

        $date = Carbon::now();
        $siswa = User::create([
            'name' => 'Icad',
            'email' => 'irsyadgmail.com',
            'password' => bcrypt('password')
        ]);
         Siswa::create([
             'nama' => $siswa->name,
             'user_id'=> $siswa->id,
             'nisn' => '02356',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'Pria',
             'kelas_id' => '2'
         ]);
        $siswa->assignRole('user');

        $date = Carbon::now();
        $siswa = User::create([
            'name' => 'Jeffry',
            'email' => 'jeffrygmail.com',
            'password' => bcrypt('password')
        ]);
         Siswa::create([
             'nama' => $siswa->name,
             'user_id'=> $siswa->id,
             'nisn' => '02146',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'Pria',
             'kelas_id' => '2'
         ]);
        $siswa->assignRole('user');

        $date = Carbon::now();
        $siswa = User::create([
            'name' => 'Hana',
            'email' => 'hanagmail.com',
            'password' => bcrypt('password')
        ]);
         Siswa::create([
             'nama' => $siswa->name,
             'user_id'=> $siswa->id,
             'nisn' => '12345',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'perempuan',
             'kelas_id' => '2'
         ]);
        $siswa->assignRole('user');

        $date = Carbon::now();
        $siswa = User::create([
            'name' => 'Habibi',
            'email' => 'habibgmail.com',
            'password' => bcrypt('password')
        ]);
         Siswa::create([
             'nama' => $siswa->name,
             'user_id'=> $siswa->id,
             'nisn' => '56234',
             'tanggal_lahir' => $date,
             'jenis_kelamin' => 'Pria',
             'kelas_id' => '1'
         ]);
        $siswa->assignRole('user');
        
    }
}
