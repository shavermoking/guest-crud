<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'surname' => $this->faker->word(),
            'country' => $this->faker->country(),
            'mail' => $this->faker->email,
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
