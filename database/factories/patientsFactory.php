<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pracownik;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\patients>
 */
class patientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->firstName(),
        'surname' => fake()->lastName(),
        'telNumb' => fake()->phoneNumber(),
        'PESEL' => fake('pl_PL')->pesel(),
        'age' => fake()->numerify('##'),
        'pracownik_id' => Pracownik::factory(),
    ];
    }
}
