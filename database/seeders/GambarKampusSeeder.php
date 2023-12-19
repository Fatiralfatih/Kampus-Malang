<?php

namespace Database\Seeders;

use App\Models\GambarKampus;
use Database\Factories\GambarKampusFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class GambarKampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GambarKampus::factory()->count(3)->forKampus()->create();
    }
}
