<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
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
            'day' => $faker->dayOfWeek,
            'time' => $faker->time('H:i') . ' - ' . $faker->time('H:i'),
            'note'=> $faker->sentence,
            'doctor_id' => Doctor::factory()
        ];
    }
}
