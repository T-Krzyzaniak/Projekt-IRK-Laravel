<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pracownik>
 */
class PracownikFactory extends Factory
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
            'position' => fake()->randomElement(['Lekarz Rezydent','Lekarz Rodzinny','Pediatra','Dermatolog','Mlodszy Technik Medycyny','Internista','Fizjoterapeuta','Dietetyk']),
        ];
    }
}
