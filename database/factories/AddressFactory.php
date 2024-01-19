<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'street_address' => $faker->streetAddress,
            'state_county' => $faker->state,
            'area' => $faker->citySuffix,
            'city' => $faker->city,
            'zip' => $faker->postcode,
            'country' => $faker->country,
        ];
    }
}
