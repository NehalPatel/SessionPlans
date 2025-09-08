<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name' => 'Nidhi Desai',
                'email' => 'nidhi.sdjic@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name' => 'Nehal Patel',
                'email' => 'nehal.sdjic@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name' => 'Jaimini Patel',
                'email' => 'jaimini.sdjic@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'name' => 'Trupti Patel',
                'email' => 'trupti.sdjic@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
