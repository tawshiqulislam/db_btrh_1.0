<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecurityQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('security_questions')->insert([
        //     'name' => 'In what city were you born?'
        // ]);
        // DB::table('security_questions')->insert([
        //     'name' => 'What is the name of your favorite pet?'
        // ]);
        // DB::table('security_questions')->insert([
        //     'name' => 'What high school did you attend?'
        // ]);
        // DB::table('security_questions')->insert([
        //     'name' => 'What was the name of your elementary school?'
        // ]);
        // DB::table('security_questions')->insert([
        //     'name' => 'What was the make of your first car?'
        // ]);
        // DB::table('security_questions')->insert([
        //     'name' => 'What was your favorite food as a child?'
        // ]);
        //security question
        DB::table('security_questions')->insert([
            ['name' => 'In what city were you born?'],
            ['name' => 'What is the name of your favorite pet?'],
            ['name' => 'What high school did you attend?'],
            ['name' => 'What was the name of your elementary school?'],
            ['name' => 'What was the make of your first car?'],
            ['name' => 'What was your favorite food as a child?'],

        ]);
    }
}
