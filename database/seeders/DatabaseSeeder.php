<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pasien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'nama' => 'Test User',
        //     'username' => 'rizky',
        //     'password' => bcrypt('password')
        // ]);

        User::create([
            'nama' => 'Rizky Septian',
            'username' => 'Rizky',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'alamat' => 'Kabupaten Sukabumi',
            'usia' => 23,
            'jenis_kelamin' => 'Laki-laki'
        ]);

        User::create([
            'nama' => 'Aliyah Shanaf',
            'username' => 'Shanaf',
            'password' => bcrypt('password'),
            'role_id' => 2,
            'alamat' => 'Kabupaten Sumenep',
            'usia' => 23,
            'jenis_kelamin' => 'Laki-laki'
        ]);

        Role::create([
            'nama_role' => 'Admin'
        ]);

        Role::create([
            'nama_role' => 'Penterapi'
        ]);

        Pasien::factory(25)->create();
    }
}
