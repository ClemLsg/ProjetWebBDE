<?php

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
            Product::create([
                'name' => $faker->domainWord,
                'price' => $faker->numberBetween(0,70)
            ]);
        }
    }
}
