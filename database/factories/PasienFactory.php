<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pasien' => fake()->name(),
            'alamat' => fake()->address(),
            'usia' => fake()->numberBetween(15, 80),
            'agama' => fake()->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha', 'Kong Hu Chu', 'Kepercayaan']),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'pekerjaan' => fake()->jobTitle()
        ];
    }
}
