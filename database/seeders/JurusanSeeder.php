<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::factory()->count(20)->state(new Sequence(
            fn(Sequence $sequence) => ['fakultas_id' => Fakultas::all()->random()]
        ))->create();
    }
}
