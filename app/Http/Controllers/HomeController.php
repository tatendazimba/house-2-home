<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Http\Controllers\Interfaces\RequestInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $posts;
    protected $requests;

    public function __construct(PostsInterface $posts, RequestInterface $requests)
    {
        $this->posts = $posts;
        $this->requests = $requests;
    }

    public function __invoke()
    {
        $heroes = $this->posts->heroes();
        $featured = $this->posts->inspiration();
        $categories = $this->posts->featuredCategories();
        $sale = $this->posts->sale();
        $new = $this->posts->new();
        $decorTips = $this->posts->decors()->reverse();

        $response = $this->requests->getInstagramPhotos();

        $instagramImages = $response->data;


        return view("home", compact("heroes", "featured", "categories", "sale", "new", "decorTips", "instagramImages"));
    }
}
