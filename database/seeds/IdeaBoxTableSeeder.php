<?php

use App\IdeaBox;
use App\User;
use Illuminate\Database\Seeder;

class IdeaBoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $userID = User::pluck('id')->toArray();

        for($i=0; $i<20; $i++){
            IdeaBox::create([
                'name' => $faker->name,
                'desc' => $faker->text(80),
                'user_id' => $faker->randomElement($userID)
            ]);

            $ideaBox = IdeaBox::pluck('id')->toArray();

            $randomID = $faker->randomElement($userID);

            DB::table('ideabox_user')->insert([
                'ideabox_id' => $faker->randomElement($ideaBox),
                'user_id' => $randomID
            ]);

            array_diff($userID, array($randomID));
        }


    }
}
