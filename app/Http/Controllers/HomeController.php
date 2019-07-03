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

        return view("home", compact("heroes", "featured", "specials", "decorTips", "tags"));
    }
}
