<?php

use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class addUserToPictureSeeder extends Seeder
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

            $pict = Picture::find($i+1);

            $user = User::find($faker->numberBetween(1,20));

            $user->posts()->save($pict);
        }
    }
}
