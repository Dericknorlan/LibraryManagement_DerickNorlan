<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsPapersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('newspapers')->insert([
                'title' => $faker->word(),
                'publisher' => $faker->name(),
                'editor' => $faker->name(),
                'dateOfPublication' => $faker->date(),
                'ISSN' => $faker->randomNumber(8),
            ]);
        }
    }
}
