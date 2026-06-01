<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\candidate>
 */
class CandidateFactory extends Factory
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
        'age' => fake()->numberBetween(19, 36),
        'math' => fake()->randomFloat(2, 2, 6),
        'polish' => fake()->randomFloat(2, 2, 6),
        'english' => fake()->randomFloat(2, 2, 6),
        'user_id' => User::factory(),
        ];
    }
}
