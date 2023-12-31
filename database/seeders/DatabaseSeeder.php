<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Designation;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'admin', 'user', 'vendor', 'controller'];
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
            'isVerified' => 1,
            'address' => '123 Main St, City',
            'id_number' => '123456789',
            'id_type' => 'NID',
            // 'sq_no_1' => null,
            // 'sq_no_1_ans' => null,
            // 'sq_no_2' => null,
            // 'sq_no_2_ans' => null,
            'pro_pic' => null,
            'date_of_birth' => '1990-01-01',
            'email_verified_at' => null,
            'verified_by' => 1,
            'password' => Hash::make('admin@example.com'),
            'user_type' => 'user', //or vendor
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),

        ])->assignRole('super_admin');
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
        for ($i = 0; $i < 25; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'email' => $faker->unique()->safeEmail,
                'phone_no' => $faker->unique()->phoneNumber,
                'TFA' => $faker->randomElement([0, 1, 2]),
                'last_login' => $faker->dateTimeThisYear,
                'isVerified' => $faker->randomElement([true, false]),
                'address' => $faker->address,
                'id_number' => $faker->unique()->randomNumber(8),
                'id_type' => $faker->randomElement(['Birth Certificate', 'NID', 'Passport']),
                // 'sq_no_1' => $faker->optional(0.2, null)->sentence,
                // 'sq_no_1_ans' => $faker->optional(0.2, null)->sentence,
                // 'sq_no_2' => $faker->optional(0.2, null)->sentence,
                // 'sq_no_2_ans' => $faker->optional(0.2, null)->sentence,
                'pro_pic' =>  $faker->word . '.jpg',
                'date_of_birth' => $faker->date,
                // 'verified_by' => $faker->optional(0.3, null)->numberBetween(1, 5),
                'email_verified_at' => $faker->boolean(90) ? now() : null, // 90% chance of being verified
                'password' => Hash::make('123456789'), // You can change the default password
                'user_type' => $faker->randomElement(['user', 'vendor']), //or vendor
            ]);
            if ($user->isVerified == true) {
                $user->assignRole('user');
            }
        }

        //project category
        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
            ];
        }

        DB::table('project_categories')->insert($data);

        //project initiation
        for ($i = 0; $i < 5; $i++) {
            // $verifiedBy = $faker->boolean ? 1 : null;
            // $isVerified = $faker->boolean ? true : false;
            DB::table('project_initiations')->insert([
                'user_id' => $faker->numberBetween(1, 5),
                'project_category_id' => $faker->numberBetween(1, 5),
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'goal' => $faker->paragraph,
                'deadline' => $faker->date,
                'required_file' => $faker->word . '.pdf',
                // 'verified_by' => $verifiedBy,
            ]);
        }
        //department
        $departments = ['Backend Developement', 'ForontEnd Development', 'Mobile Application', 'UI/UX'];
        foreach ($departments as $department) {
            DB::table('departments')->insert([
                'name' => $department,
                'user_id' => $faker->boolean(50) ? $faker->numberBetween(1, 5) : null, // 30% chance of having a user_id
                'designation' => $faker->optional(0.5, null)->word, // 30% chance of having a designation
            ]);
        }
        //status
        $statuses = ['active', 'inactive', 'pending', 'canceled', 'completed','approved'];
        foreach ($statuses as $status) {
            DB::table('statuses')->insert([
                'status' => $status,
            ]);
        }

        //resources
        for ($i = 0; $i < 5; $i++) {
            DB::table('resources')->insert([
                'added_by' => 1, // Replace with the user ID who added the resource
                'name' => $faker->name,
                'description' => $faker->sentence,
                'resource_type' => $faker->word,
                'quantity' => $faker->randomNumber(2),
                'cost' => $faker->randomFloat(2, 10, 1000),
                'document' => $faker->word . '.pdf',
                'date_added' => $faker->date,
            ]);
        }
        //designation
        $designations = ['team leader', 'co leader', 'senior developer', 'junior developer'];
        foreach ($designations as $designation) {
            Designation::create(['name' => $designation]);
        }
    }
}