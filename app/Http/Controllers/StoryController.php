<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Post;

class StoryController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke(Post $post)
    {
        $post = Post::with("images")->find($post->id);

        return view("add-to-cart", compact("post"));
    }
}
