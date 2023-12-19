<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusan = ['informatika', 'management', 'pertanina'];
        return [
            'nama' => fake()->randomElement($jurusan),
            'slug' => fake()->slug(2,true),
            'status' => 1,
        ];
    }
}
