<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke()
    {
        $heroes = $this->posts->heroes();
        $featured = $this->posts->inspiration();
        $categories = $this->posts->featuredCategories();
        $sale = $this->posts->sale();
        $new = $this->posts->new();

        return view("home", compact("heroes", "featured", "categories", "sale", "new"));
    }
}
