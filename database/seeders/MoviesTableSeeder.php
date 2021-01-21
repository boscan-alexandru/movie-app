<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

        // And now, let's create a few movies in our database:
        for ($i = 0; $i < 50; $i++) {
            Movie::create([
                'status' => $faker->numberBetween($min = 1, $max = 2),
                'name' => $faker->movie,
                'rating' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10),
                'description' => $faker->text,
                'image' => $faker->randomElement($array = array ('/assets/movies-images/space-force.jpg','/assets/movies-images/joker.jpg','/assets/movies-images/forest-gump.jpg')),
            ]);
        }
    }
}
