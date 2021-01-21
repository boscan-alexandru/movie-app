<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i <= 50; $i++) { 
            $artist = Artist::create([
                'name' => $faker->firstNameMale,
                'title' => $faker->randomElement(['star', 'writer', 'director'])
            ]);

            $artist->movies()->attach(rand(1, $i));

        }

    }
}
