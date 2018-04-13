<?php

use App\Order;
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

        $order_id = Order::all()->pluck('id')->toArray();

        for($i=0; $i<20; $i++){
            $user = User::create([
                'name' => $faker->firstName,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'surname' => $faker->lastName,
                'rank' => $faker->numberBetween(0,2),
            ]);

            $pict = Picture::find(1);

            $pict->user()->save($user);

            $random_elem = $faker->randomElement($order_id);
            $order = Order::find($random_elem);
            $order_id = array_diff($order_id, array($random_elem));

            $user->orders()->save($order);

        }
    }
}
