<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'fname' => 'System',
                'mname' => null,
                'lname' => 'Admin',
                'suffix' => null,
                'email' => 'admin@gmail.com',
                'usertype' => 'admin',
                'image' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // Replace 'password' with a secure password
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Mark Bryan',
                'mname' => 'B.',
                'lname' => 'Labinay',
                'suffix' => null,
                'email' => 'bryan@gmail.com',
                'usertype' => 'user',
                'image' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Ella',
                'mname' => 'C.',
                'lname' => 'Cortez',
                'suffix' => null,
                'email' => 'ella@gmail.com',
                'usertype' => 'user',
                'image' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fname' => 'Patient',
                'mname' => null,
                'lname' => 'Williams',
                'suffix' => null,
                'email' => 'user@gmail.com',
                'usertype' => 'user',
                'image' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
