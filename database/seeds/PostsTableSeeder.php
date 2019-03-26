<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class, 120)->create()->each(function($post) {

            // seed images and attach to post
            $images = factory(\App\Image::class, rand(1, 5))->make();

            $post->images()->saveMany($images);

            // seed tags and attach to post
            $tags = \App\Tag::orderByRaw('RAND()')->take(rand(1, 4))->get();

            $post->tags()->attach($tags);
        });
    }
}
