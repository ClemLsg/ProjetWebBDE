<?php

use App\Activitie;
use App\Picture;
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
        Picture::truncate();
        Activitie::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
