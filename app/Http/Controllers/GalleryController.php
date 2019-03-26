<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;

class GalleryController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke($tagParameter)
    {
        $featured = $this->posts->gallery();
        $allTags = $this->posts->index();
        $galleryTags = $this->posts->galleryTags();

        if ($tagParameter === "ALL") {
            $featured = $this->posts->gallery();
        }
        else {
            $featured = $this->posts->galleryWithTag($tagParameter);
        }

        return view("gallery", compact("allTags", "featured", "categories", "shop", "galleryTags", "tagParameter"));
    }
}
