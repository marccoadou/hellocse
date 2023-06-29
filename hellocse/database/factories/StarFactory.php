<?php

namespace Database\Factories;

use App\Models\Star;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Star>
 */
class StarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Star::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'  => $this->faker->firstName(),
            'last_name'   => $this->faker->lastName(),
            'description' => $this->faker->text(),
        ];
    }
}
