<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileClinic>
 */
class ProfileClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('id_ID');
        return [
            'name' => $faker->name(),
            'address' => $faker->address(),
            'phone' => $faker->phoneNumber(),
            'email' => $faker->unique()->safeEmail(),
            'doctor_name' => $faker->name(),
            'unique_code' => $faker->uuid(),
        ];
    }
}
