<?php

use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            $user = User::create([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => $faker->password,
                'surname' => $faker->lastName,
                'rank' => $faker->numberBetween(0,2),
            ]);

            $pict = Picture::find(1);

            $pict->user()->save($user);

        }
    }
}
