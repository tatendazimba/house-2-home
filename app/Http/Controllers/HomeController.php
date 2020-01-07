<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Http\Controllers\Interfaces\RequestInterface;
use App\Http\Controllers\Interfaces\TagInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $posts;
    protected $tags;
    protected $requests;

    public function __construct(PostsInterface $posts, TagInterface $tags, RequestInterface $requests)
    {
        $this->posts = $posts;
        $this->tags = $tags;
        $this->requests = $requests;
    }

    public function __invoke()
    {
        $heroes = $this->posts->heroes();
        $specials = $this->posts->specials();
        $decorTips = $this->posts->decors()->reverse();

        $whyUsReasons = [
            [
                "title" => "Fast Delivery",
                "description" => "Deliveries to all areas in Harare for orders above $50.",
                "image" => "/images/icons/products.svg",
            ],
            [
                "title" => "Easy Returns",
                "description" => "Deliveries to all areas in Harare for orders above $50.",
                "image" => "/images/icons/products.svg",
            ],
            [
                "title" => "Payment Options",
                "description" => "Deliveries to all areas in Harare for orders above $50.",
                "image" => "/images/icons/products.svg",
            ],
            [
                "title" => "Wide Selection",
                "description" => "Deliveries to all areas in Harare for orders above $50.",
                "image" => "/images/icons/products.svg",
            ],
        ];

        return view("home", compact("whyUsReasons", "heroes", "featured", "specials", "decorTips", "tags"));
    }
}
