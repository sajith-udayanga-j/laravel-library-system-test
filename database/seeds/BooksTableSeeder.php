<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;


class BooksTableSeeder extends Seeder
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

        // Fetch existing author IDs
        $authorIds = DB::table('authors')->pluck('id');

        foreach (range(1, 20) as $index) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author_id' => $faker->randomElement($authorIds),
                'created_at' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
                'updated_at' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
