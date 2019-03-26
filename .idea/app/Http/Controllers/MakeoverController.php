<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;

class MakeoverController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke($tagParameter)
    {
        $heroes = $this->posts->heroes();
        $featured = $this->posts->makeovers();
        $categories = $this->posts->featuredCategories();
        $shopTags = $this->posts->shopTags();

        if ($tagParameter === "ALL") {
            $shop = $this->posts->shop();
        }
        else {
            $shop = $this->posts->shopWithTag($tagParameter);
        }

        return view("makeovers", compact("heroes", "featured", "categories", "shop", "shopTags", "tagParameter"));
    }
}
