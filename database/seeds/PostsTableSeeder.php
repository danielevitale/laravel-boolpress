<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) {
          $nuovo_post = new Post();
          $nuovo_post->title = $faker->sentence();
          $nuovo_post->content = $faker->text($maxNbChars = 1000);
          $nuovo_post->author = $faker->name;
          $nuovo_post->slug = Str::slug($nuovo_post->title);
          $nuovo_post->save();
        }
    }
}
