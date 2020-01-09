<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $repo;

    public function __construct(PostsInterface $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke(Request $request, $string = "all")
    {

        $string = $request->input("search") ?: $string;

        if ($request->input("search"))
            return redirect(route("search", $string));

        if (strtolower($string) === "all") {
            $featured = $this->repo->index();
        }
        else {
            $featured = $this->repo->search($string);
        }

        $shopTags = $this->repo->shopTags();

        return view("decor", compact("featured", "string", "shopTags"));
    }
}
