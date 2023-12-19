<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fakultas::factory()->count(10)->state(new Sequence(
            fn (Sequence $sequence) => ['kampus_id' => Kampus::all()->random()]
        ))->create();
    }
}
