<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'service' => 'Consultation',
                'description' => 'General Check-up and health assessments by licensed physicians',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'X-ray',
                'description' => 'Imaging service to assess internal conditions, including bones and chest.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Electrocardiogram(ECG)',
                'description' => 'Test to monitor heart electrical activity.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Ultrasound',
                'description' => 'Imaging service for internal organs, including abdominal and pelvic exams.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Labaratory',
                'description' => 'Test Blood, Urine, and other diagnostic tests for health evaluation.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service' => 'Drug Test',
                'description' => 'Screening for substance use, commonly required for employment.',
                'img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
