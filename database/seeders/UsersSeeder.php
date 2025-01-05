<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Junaedi',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jajang',
            'email' => 'adminlapangan@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'adminlapangan',
        ]);

        User::create([
            'name' => 'Tegar',
            'email' => 'tegar@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);

    }
}
