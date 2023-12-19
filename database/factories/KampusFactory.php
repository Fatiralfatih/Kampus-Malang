<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kampus>
 */
class KampusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->company(),
            'slug' => fake()->slug(2,true),
            'alamat' => fake()->city(),
            'akreditasi' => fake()->randomElement(['A', 'B', 'C']),
            'tentang' => fake()->paragraphs(4,true),
            'website' => fake()->lexify('??????.ac.id'),
            'kategori' => fake()->randomElement(['politeknik', 'swasta', 'negeri', 'sekolah tinggi', 'insitut'])
        ];
    }
}
