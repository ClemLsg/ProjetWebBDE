<?php

use App\Order;
use App\User;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<1000; $i++){
            $order = Order::create([
                'status' => $faker->numberBetween(0,1)
            ]);

            $user = User::find($faker->numberBetween(1,20));

            $user->orders()->save($order);
        }

    }
}
