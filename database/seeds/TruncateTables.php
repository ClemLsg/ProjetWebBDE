<?php

use App\Activitie;
use App\Comment;
use App\Order;
use App\Picture;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class TruncateTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('picture_product')->truncate();
        Order::truncate();
        Picture::truncate();
        Activitie::truncate();
        User::truncate();
        Product::truncate();
        Comment::truncate();
        Schema::enableForeignKeyConstraints();

    }
}
