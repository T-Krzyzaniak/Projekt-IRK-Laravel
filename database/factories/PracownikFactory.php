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
            'position' => fake()->randomElement(['Matematyk','Humanista','Filozof','Geograf','Chemik','Internista','Psycholog','Wuefista','Anglista','Germanista','Rusycysta','Romanista']),
        ];
    }
}
