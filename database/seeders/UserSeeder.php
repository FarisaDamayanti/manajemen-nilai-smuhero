<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // GURU 1
        User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru1@gmail.com',
            'password' => Hash::make('guru1'),
            'role' => 'guru',
        ]);

        // GURU 2
        User::create([
            'name' => 'Guru Bahasa Indonesia',
            'email' => 'guru2@gmail.com',
            'password' => Hash::make('guru2'),
            'role' => 'guru',
        ]);
    }
    
}
