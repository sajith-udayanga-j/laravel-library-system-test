<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;



class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('authors')->insert([
                'name' => $faker->name,
                'created_at' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
            ]);
        }

        // DB::table('authors')->insert([
        //     'name' => 'sajiorty',
        //     'created_at' => DateTime(),
        //     'updated_at' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
        // ]);
    }
}
