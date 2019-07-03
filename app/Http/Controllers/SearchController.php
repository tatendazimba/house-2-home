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


        $count = $featured->count();

        if ($count <= 3) {
            if ($count === 1) {
                foreach (array_fill(0, 2, "") as $i) {
                    $featured->push(new Post());
                }
            }

            if ($count === 2) {
                foreach (array_fill(0, 1, "") as $i) {
                    $featured->push(new Post());
                }
            }

            if ($count === 3) {
                foreach (array_fill(0, 0, "") as $i) {
                    $featured->push(new Post());
                }
            }
        } else {

            $mod = $featured->count() % 4;

            if ($mod === 0) {
                foreach (array_fill(0, 3, "") as $i) {
                    $featured->push(new Post());
                }
            }

            if ($mod === 1) {
                foreach (array_fill(0, 2, "") as $i) {
                    $featured->push(new Post());
                }
            }

            if ($mod === 2) {
                foreach (array_fill(0, 1, "") as $i) {
                    $featured->push(new Post());
                }
            }

        }

        return view("decor", compact("featured", "string"));
    }
}
