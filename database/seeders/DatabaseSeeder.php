<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'username' => 'super_admin',
            'email' => 'admin@example.com',
            'phone_no' => '0123456789',
            'TFA' => 0,
            'last_login' => null,
            'isVerified' => 0,
            'address' => '123 Main St, City',
            'id_number' => '123456789',
            'id_type' => 'NID',
            'sq_no_1' => null,
            'sq_no_1_ans' => null,
            'sq_no_2' => null,
            'sq_no_2_ans' => null,
            'pro_pic' => null,
            'date_of_birth' => '1990-01-01',
            'email_verified_at' => null,
            'password' => Hash::make('adminpassword'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
