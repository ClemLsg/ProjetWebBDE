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
        DB::table('categories')->insert(['name' => 'Sweat']);
        DB::table('categories')->insert(['name' => 'Mugs']);
        DB::table('categories')->insert(['name' => 'Tee-Shirt']);
        DB::table('categories')->insert(['name' => 'Stickers']);
        DB::table('categories')->insert(['name' => 'Bouffe']);
    }
}
