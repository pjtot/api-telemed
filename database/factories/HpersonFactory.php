<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hperson>
 */
class HpersonFactory extends Factory
{
    protected $model = \App\Models\Hperson::class;
    
    public function definition(): array
    {
        return [
            'hpercode' => str_pad(strval(fake()->unique()->numberBetween(1000000, 9999999)), 15, '0', STR_PAD_LEFT),
            'patlast' => fake()->lastName(),
            'patfirst' => fake()->firstName(),
            'patbdate' => fake()->date(),
            'patsex' => fake()->randomElement(['M', 'F']),
        ];
    }
}
