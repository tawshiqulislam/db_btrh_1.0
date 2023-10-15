<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //project category
        $faker = FakerFactory::create();
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
            ];
        }

        DB::table('project_categories')->insert($data);
    }
}