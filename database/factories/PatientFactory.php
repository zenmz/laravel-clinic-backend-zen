<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'nik' => $faker->nik(),
            'kk' => $faker->nik(),
            'name' => $faker->name(),
            'phone' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'gender' => $faker->randomElement(['male', 'female']),
            'birth_place' => $faker->city(),
            'birth_date' => $faker->date(),
            'is_deceased' => $faker->boolean(),
            'address_line' => $faker->address(),
            'city' => $faker->city(),
            'city_code' => $faker->randomNumber(),
            'province' => $faker->state(),
            'province_code' => $faker->randomNumber(),
            'district' => $faker->city(),
            'district_code' => $faker->randomNumber(),
            'village' => $faker->city(),
            'village_code' => $faker->randomNumber(),
            'rt' => $faker->randomDigit(),
            'rw' => $faker->randomDigit(),
            'postal_code' => $faker->postcode(),
            'martial_status' => $faker->randomElement(['single', 'married', 'widow', 'widower']),
            'relationship_name' => $faker->name(),
            'relationship_phone' => $faker->phoneNumber(),
        ];
    }
}
