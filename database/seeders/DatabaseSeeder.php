<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
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
            'password' => Hash::make('adminpassword'),
            'user_type' => 'office', //or vendor
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        \App\Models\AdminList::create([
            'user_id' => 1,
            'user_type' => 'super_admin', // or 'admin' depending on the user type
        ]);
        //random adminlist creation
        for ($i = 0; $i < 15; $i++) {
            DB::table('admin_lists')->insert([
                'user_id' => $faker->numberBetween(2, 15), // Replace with an appropriate range
                'user_type' => $faker->randomElement(['super_admin', 'admin']),
            ]);
        }

        //security question
        DB::table('security_questions')->insert([
            ['name' => 'In what city were you born?'],
            ['name' => 'What is the name of your favorite pet?'],
            ['name' => 'What high school did you attend?'],
            ['name' => 'What was the name of your elementary school?'],
            ['name' => 'What was the make of your first car?'],
            ['name' => 'What was your favorite food as a child?'],

        ]);
        //random user creation
        for ($i = 0; $i < 15; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'phone_no' => $faker->unique()->phoneNumber,
                'TFA' => $faker->randomElement([0, 1, 2]),
                'last_login' => $faker->dateTimeThisYear,
                'isVerified' => $faker->boolean(80), // 80% chance of being verified
                'address' => $faker->address,
                'id_number' => $faker->unique()->randomNumber(8),
                'id_type' => $faker->randomElement(['Birth Certificate', 'NID', 'Passport']),
                'sq_no_1' => $faker->optional(0.2, null)->sentence,
                'sq_no_1_ans' => $faker->optional(0.2, null)->sentence,
                'sq_no_2' => $faker->optional(0.2, null)->sentence,
                'sq_no_2_ans' => $faker->optional(0.2, null)->sentence,
                'pro_pic' => $faker->optional(0.5, null)->imageUrl(200, 200, 'people'),
                'date_of_birth' => $faker->date,
                'verified_by' => $faker->optional(0.3, null)->numberBetween(1, 10),
                'email_verified_at' => $faker->boolean(90) ? now() : null, // 90% chance of being verified
                'password' => Hash::make('password123'), // You can change the default password
                'user_type' => 'office', //or vendor
            ]);
        }

        //project category
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
            ];
        }

        DB::table('project_categories')->insert($data);

        //project initiation
        for ($i = 0; $i < 15; $i++) {
            $verifiedBy = $faker->boolean ? 1 : null;
            DB::table('project_initiations')->insert([
                'project_category_id' => $faker->numberBetween(1, 15),
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'goal' => $faker->paragraph,
                'deadline' => $faker->date,
                'required_file' => $faker->word . '.pdf',
                'verified_by' => $verifiedBy,
            ]);
        }
        //department
        for ($i = 0; $i < 15; $i++) {
            DB::table('departments')->insert([
                'name' => $faker->word,
                'user_id' => $faker->boolean(50) ? $faker->numberBetween(2, 15) : null, // 30% chance of having a user_id
                'designation' => $faker->optional(0.5, null)->word, // 30% chance of having a designation
            ]);
        }
    }
}
