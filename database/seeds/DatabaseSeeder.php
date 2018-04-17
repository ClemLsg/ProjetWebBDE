<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateTables::class);
        $this->call(PicturesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ActivitiesSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(IdeaBoxTableSeeder::class);
    }
}
