<?php

use App\Picture;
use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i=0; $i<30; $i++){
            Picture::create([
                'url' => $faker->imageUrl(640,480)
            ]);
        }
    }
}
