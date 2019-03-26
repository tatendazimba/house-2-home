<?php

namespace App\Http\Controllers\ADMIN;

use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteTagController extends Controller
{
    public function __invoke(Request $request, Post $story, Tag $tag)
    {

        $postTag = PostTag::where([
            ["post_id", $story->id],
            ["tag_id", $tag->id]
        ])->first();

        $postTag->delete();

//        $story->tags()->detach($tag);

        return back();
    }
}
