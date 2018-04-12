<?php

use App\Comment;
use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $pictures = Picture::all()->pluck('id')->toArray();

        for($i=0; $i<20; $i++){
            $comment = Comment::create([
                'content' => $faker->text(100),
                'picture_id' => $faker->randomElement($pictures)
            ]);

            $user = User::find($faker->numberBetween(1,20));

            $user->comments()->save($comment);

        }
    }
}
