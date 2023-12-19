<?php

namespace Database\Factories;

use App\Models\Kampus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fakultas>
 */
class FakultasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakultas = ['kedokteran gigi', 'teknik', 'ilmu administrasi', 'ekonomi dan bisnis', 'vokasi', 'pertanian'];
        return [
            'nama' => fake()->randomElement($fakultas),
            'slug' => fake()->slug(2 ,true),
            'tentang' => fake()->paragraph(),
            'status' => 1
        ];
    }
}
