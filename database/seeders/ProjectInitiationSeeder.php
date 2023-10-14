<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectInitiationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //project initiation
        $faker = FakerFactory::create();
        for ($i = 0; $i < 10; $i++) {
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
    }
}
