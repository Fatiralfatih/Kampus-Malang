<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count('3')->sequence(
            [
                'nama' => 'Fatir Al Fatih',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
            [
                'email' => 'member@gmail.com',
                'role' => 'member',
                'password' => bcrypt('12345')
            ],
            [
                'email' => 'member2@gmail.com',
                'role' => 'member',
                'password' => bcrypt('12345')
            ]
        )->create();
    }
}
