<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $faker = Faker::create();
        for ($i = 0; $i < 1; $i++) {
            DB::table('events')->insert([
                [
                    'title' => 'Free Consultation Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'General Check-up and health assessments by licensed physicians',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Anyone seeking medical advice or a second opinion.',
                        'Individuals with specific health concerns or who need guidance on managing long-term conditions.',
                        'People interested in learning about healthier lifestyles from our professionals.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'X-Ray Screening Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'Imaging service to assess internal conditions, including bones and chest.',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Individuals experiencing joint pain, back pain, or respiratory issues.',
                        'Patients recommended for an X-ray by their doctor.',
                        'Those seeking early detection of health issues related to bones or organs.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'ECG Screening Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'Quick, non-invasive heart screening to check for heart rhythm issues, previous heart attacks, or other cardiac conditions.',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Individuals with a family history of heart disease.',
                        'People experiencing chest pain, palpitations, or irregular heartbeats.',
                        'Those looking for a routine check-up to monitor their heart health.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Ultrasound Screening Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'Quick, non-invasive heart screening to check for heart rhythm issues, previous heart attacks, or other cardiac conditions.',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Pregnant women in need of routine prenatal care.',
                        'Individuals experiencing abdominal pain, bloating, or other digestive issues.',
                        'People who need follow-up screenings for existing health concerns.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Laboratory Testing Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'Take charge of your health with our Laboratory Testing Day, offering a wide range of essential tests at discounted rates to help you monitor your well-being.',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Individuals looking for a routine health check-up.',
                        'Those with a family history of diabetes, heart disease, or thyroid issues.',
                        'People who want to monitor their liver, kidney, or overall health status.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Drug Testing Day at Mendoza Clinic',
                    'date' => $faker->date(),
                    'time' => $faker->time(),
                    'location' => $faker->address,
                    'description' => 'We are offering confidential drug testing services for various purposes, including employment requirements, legal needs, and personal health monitoring',
                    'activity' => $faker->sentence(),
                    'attend' => $faker->randomElement([
                        'Individuals required to undergo drug testing for employment or legal purposes.',
                        'People looking to monitor their drug-free status for personal health reasons.',
                        'Employers who wish to schedule group testing for their employees.'
                    ]),
                    'img' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
