<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('doctor_lists')->insert([
                'admin_id' => $faker->numberBetween(2, 4),
                'fname' => $faker->firstName(),
                'mname' => $faker->optional()->firstName(),  // Changed to optional for middle name
                'lname' => $faker->lastName(),
                'suffix' => $faker->optional()->suffix(),  // Made suffix optional
                'position' => $faker->randomElement([
                    'Medical Officer IV',
                    'Medica Officer III',
                    'Medical Officer II',
                    'Medical Officer I'
                ]),
                'district' => $faker->randomElement([
                    'Aparri, Provincial, Hospital',
                    'Grupo De Medicano Hospital',
                    'Lyceum of Aparri Hospital',
                    'Christian Medical Clinic'
                ]),
                'image' => null, // Add the image field and set it to null
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
