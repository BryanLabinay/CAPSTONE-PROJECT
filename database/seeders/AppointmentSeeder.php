<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('appointments')->insert([
                'user_id' => $faker->numberBetween(2, 4),
                'fname' => $faker->firstName(),
                'mname' => $faker->optional()->firstName(),  // Changed to optional for middle name
                'lname' => $faker->lastName(), // Convert the number to a string
                'suffix' => $faker->optional()->suffix(),  // Made suffix optional
                'email' => $faker->unique()->safeEmail(),
                'address' => $faker->address(),
                'phone' => '+63' . $faker->phoneNumber,
                'date' => $faker->dateTimeBetween('2025-01-01', '2025-12-31')->format('Y-m-d'),
                'appointment' => $faker->randomElement([
                    'Check-Up',
                    'Ultrasound',
                    'Xray',
                    '2D Echo with Doppler',
                    'ECG',
                    'NST',
                    'Consultation',
                    'Drug Test'
                ]),
                'message' => $faker->sentence(),
                'status' => $faker->randomElement(['Pending', 'Approved', 'Cancelled', 'Rescheduled']),
                'reason' => $faker->optional()->sentence(),  // Optional reason
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
