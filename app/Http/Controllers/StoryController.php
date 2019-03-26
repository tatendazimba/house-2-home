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
        $heroes = $this->posts->heroes();
        $featured = $this->posts->featured();
        $categories = $this->posts->featuredCategories();
        $shopTags = $this->posts->shopTags();

        return view("story", compact("post", "featured", "categories", "shop", "shopTags", "tagParameter"));
    }
}
