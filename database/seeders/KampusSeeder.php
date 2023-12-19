<?php

namespace Database\Seeders;

use App\Models\GambarKampus;
use App\Models\Kampus;
use App\Models\Kontak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kampus::truncate();
        Kontak::truncate();
        Kampus::factory()
            ->count(20)
            ->hasKontak()
            // ->has(GambarKampus::factory()->count(3), 'Gambar')
            ->create();
    }
}
