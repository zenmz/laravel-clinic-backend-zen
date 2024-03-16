<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\ProfileClinic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@ad.c',
            'password' => Hash::make('qqqq1111'), // password
            'role' => 'admin',
            'phone' => '123456789',
        ]);

        ProfileClinic::factory(10)->create();
        Doctor::factory(10)->create();
        
    }
}
