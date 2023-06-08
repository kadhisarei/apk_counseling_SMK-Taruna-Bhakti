<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(WaliKelasSeeder::class);
        $this->call(GuruBkSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SiswaSeeder::class);

        // $admin = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // $admin->assignRole($admin_role);

        // $user = User::create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('password')
        // ]);

        // $user->assignRole($user_role);

        // $permission = Permission::create(['name' => 'edit articles']);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
