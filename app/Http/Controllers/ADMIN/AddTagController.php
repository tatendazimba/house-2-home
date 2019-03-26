<?php

namespace App\Http\Controllers\ADMIN;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddTagController extends Controller
{

    public function __invoke(Request $request, Post $story, Tag $tag)
    {

        $story->tags()->attach($tag);

        return back();
    }
}
