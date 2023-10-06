<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sques')->insert([
            'security_question' => 'In what city were you born?'
        ]);
        DB::table('sques')->insert([
            'security_question' => 'What is the name of your favorite pet?'
        ]);
        DB::table('sques')->insert([
            'security_question' => 'What high school did you attend?'
        ]);
        DB::table('sques')->insert([
            'security_question' => 'What was the name of your elementary school?'
        ]);
        DB::table('sques')->insert([
            'security_question' => 'What was the make of your first car?'
        ]);
        DB::table('sques')->insert([
            'security_question' => 'What was your favorite food as a child?'
        ]);
    }
}
