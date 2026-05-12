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
            'name' => 'Hilal Pratama',
            'email' => 'hilal@gmail.com',
            'password' => Hash::make('hilal'),
            'role' => 'guru',
        ]);

        // // GURU 2
        // User::create([
        //     'name' => 'Iffah Rahmawati',
        //     'email' => 'iffah@gmail.com',
        //     'password' => Hash::make('iffah'),
        //     'role' => 'guru',
        // ]);
    }
    
}
