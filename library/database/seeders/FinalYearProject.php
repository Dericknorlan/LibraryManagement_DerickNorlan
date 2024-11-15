<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinalYearProject extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('finalYearProject')->insert([
                'title' => $faker->word(),
                'studentName' => $faker->name(),
                'NIM' => $faker->randomNumber(8),
                'supervisor' => $faker->name(),
                'department' => $faker->randomElement(['IMT', 'MAN', 'VCD']),
                'year' => $faker->year(),
            ]);
        }
    }
}
