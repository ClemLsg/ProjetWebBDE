<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(['name' => 'Sweat'],['name' => 'Mugs'],['name' => 'Tee-Shirt'],['name' => 'Stickers'],['name' => 'Bouffe']);
    }
}
