<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hpersonal>
 */
class HpersonalFactory extends Factory
{
    protected $model = \App\Models\Hpersonal::class;
    
    public function definition(): array
    {
        return [
            'employeeid' => fake()->unique()->numberBetween(1000000, 9999999),
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'postitle' => fake()->jobTitle(),
            'deptcode' => \App\Models\Htypser::inRandomOrder()->first()->tscode,
        ];
    }
}
