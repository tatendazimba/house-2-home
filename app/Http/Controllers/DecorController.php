<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;

class DecorController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke($tagParameter)
    {
        $featured = $this->posts->decors();
        $categories = $this->posts->featuredCategories();
        $shopTags = $this->posts->shopTags();

        if ($tagParameter === "ALL") {
            $shop = $this->posts->shop();
        }
        else {
            $shop = $this->posts->shopWithTag($tagParameter);
        }

        return view("decor", compact("featured", "categories", "shop", "shopTags", "tagParameter"));
    }
}
