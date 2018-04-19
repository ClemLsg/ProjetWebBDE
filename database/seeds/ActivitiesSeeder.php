<?php

use App\Activitie;
use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Activitie::truncate();

        $faker = \Faker\Factory::create();

        for($i=0; $i<20; $i++){
            $acti = Activitie::create([
                'name' => $faker->domainWord,
                'description' => $faker->realText(150),
                'recurrent' => $faker->numberBetween(0,1),
                'price' => $faker->numberBetween(0,100),
                'date' => $faker->date()
            ]);

            $user = User::find($faker->numberBetween(1,20));

            $pict = Picture::find($i + 2);

            $acti->participants()->save($user);

            $acti->pictures()->save($pict);

            $user->propose()->save($acti);
        }
    }
}
