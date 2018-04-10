<?php

use App\Picture;
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<20; $i++){
            $prod = Product::create([
                'name' => $faker->domainWord,
                'price' => $faker->numberBetween(0,70)
            ]);
            $pict = Picture::find($faker->numberBetween(2,20));

            $prod->pictures()->attach($pict);

        }
    }
}
