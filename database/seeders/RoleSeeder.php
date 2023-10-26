<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'admin', 'office', 'vendor', 'controller'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $faker = FakerFactory::create();
        \App\Models\User::create([
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
            'password' => Hash::make('admin@example.com'),
            'user_type' => 'super_admin', //or vendor
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ])->assignRole('super_admin');
    }
}
