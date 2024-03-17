<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'nik' => $faker->nik(),
            'specialist' => $faker->jobTitle(),
            'phone' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'address' => $faker->address(),
            'photo' => $faker->imageUrl(),
            'sip' => $faker->ean8(),
            'id_ihs' => $faker->ean8(),
        ];
    }
}
