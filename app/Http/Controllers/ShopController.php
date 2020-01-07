<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Tag;

class ShopController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke($tagParameter)
    {
        $heroes = $this->posts->heroes();
        $featured = $this->posts->inspiration();
        $categories = $this->posts->featuredCategories();
        $shopTags = $this->posts->shopTags();

        // TODO refactor this
        $tag = Tag::where("name", $tagParameter)->firstOrFail();

        if ($tagParameter === "ALL") {
            $shop = $this->posts->shop();
        }
        else {
            $shop = $this->posts->shopWithTag($tagParameter);
        }

        return view("shop", compact("heroes", "featured", "categories", "shop", "shopTags", "tagParameter", "tag"));
    }
}
