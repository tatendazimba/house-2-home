<?php
/**
 * Created by PhpStorm.
 * User: tat-nda
 * Date: 3/5/19
 * Time: 7:38 PM
 */

namespace App\Http\Controllers\Repositories;


use App\Http\Controllers\Interfaces\PostsInterface;
use App\Post;
use App\Tag;
use function foo\func;
use Illuminate\Database\Eloquent\Collection;

class PostsRepository implements PostsInterface
{
    protected $posts;
    protected $tags;

    public function __construct(Post $posts, Tag $tags)
    {
        $this->posts = $posts;
        $this->tags = $tags;
    }

    public function index()
    {
        $posts = $this->posts->with("images")->orderBy("id", "desc")->paginate();

        return $posts;
    }

    public function find($name)
    {
        $posts = Post::whereHas('tags', function ($query) use ($name) {
                $query->where([
                    ['name', '=', $name]
                ]);
            })
            ->with("tags")->paginate();

        return $posts;
    }

    public function popular()
    {
        return $this->posts->orderBy("id", "desc")->limit(5)->get();
    }

    public function popularProducts()
    {
        return $this->posts->orderBy("id", "desc")->limit(5)->get();
    }

    public function destroy(Post $post)
    {
        return $post->delete();
    }

    public function store($request)
    {
        $post = new Post();
        $post->fill($request);
        $post->save();

        // TODO log

        return $post;
    }

    public function heroes()
    {
        $posts = Post::whereHas("tags", function ($query){
            $query->where([
                ['name', '=', "Hero"]
            ]);
        })
            ->with("images.prices")->orderBy("id", "desc")->get();

        return $posts;

    }

    public function inspiration()
    {
        $posts = $this->tags->where("name", "Inspiration")->first()->posts()->orderBy("id", "desc")->get();

        return $posts;
    }

    public function featuredCategories()
    {
        $shopTags = $this->shopTags();

        $tags = $this->tags->whereNotIn("name", ["Hero", "Inspiration", "New", "Sales & Offers", "Shop"])->has("posts", ">=", "1")->get();

        $featuredTags = $shopTags->intersect($tags);

        $finalTags = [];

//        foreach ($featuredTags as $tags) {
//            $x = [];
//            foreach ($tags->posts()->with("tags")->get() as $postKey => $post) {
//                foreach ($post->tags()->get() as $tag) {
//                    if ($tag->name === "Shop") {
////                        dd($post->with("images")->first());
//                        $x[] = $post->with("images")->first();
//                        break;
//                    }
//
//                    // remove post
//                    $tags->posts()->with("tags")->get()->forget($postKey);
//
//                }
//            }
//
//            $newTag = new Tag([
//                "name" => $tags->name,
//                "description" => $tags->description
//            ]);
//
//            $newTag->posts->add(new Collection($x));
//
//            $finalTags[] = $newTag;
//        }

//        dd($finalTags);

        return $featuredTags;
    }

    public function shopCategories()
    {

        $posts = Post::whereHas('tags', function ($query) {
            $query->where([
                    ['name', '=', "Shop"]
                ]);
            })
            ->whereNotIn("name", [
                "Hero",
                "Inspiration",
                "New",
                "Sales & Offers"
            ])
            ->with("tags")->get();

        return $posts;
    }

    public function sale()
    {
        $posts = $this->tags->where("name", "Sales & Offers")
                            ->get();

        return $posts;
    }

    public function specials()
    {
        $posts = Post::whereHas("tags", function ($query){
            $query->where([
                ['name', '=', "Shop"]
            ]);
        })->with("images.prices")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function new()
    {
        $posts = $this->tags->where("name", "New")->get();

        return $posts;
    }

    public function shop()
    {

        $posts = Post::whereHas("tags", function ($query){
                $query->where([
                    ['name', '=', "Shop"]
                ]);
            })->with("tags", "images.prices")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function makeovers()
    {

        $posts = Post::whereHas("tags", function ($query){
            $query->where([
                ['name', '=', "Makeover"]
            ]);
        })
            ->with("tags")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function gallery()
    {

        $posts = Post::whereHas("tags", function ($query){
            $query->where([
                ['name', '=', "Gallery"]
            ]);
        })
            ->with("tags")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function featured()
    {

        $posts = Post::whereHas("tags", function ($query){
                $query->where([
                    ['name', '=', "Featured"]
                ]);
            })
            ->with("tags")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function decors()
    {

        $posts = Post::whereHas("tags", function ($query){
                $query->where([
                    ['name', '=', "Decor Tips"]
                ]);
            })
            ->with("images.prices")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function shopWithTag($tag)
    {
        $posts = Post::whereHas('tags', function ($query) {
                $query->where([
                    ['name', '=', "Shop"]
                ]);
            })
            ->whereHas("tags", function ($query) use ($tag){
                $query->where([
                    ['name', '=', $tag]
                ]);
            })->with("tags", "images.prices")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function galleryWithTag($tag)
    {
        $posts = Post::whereHas('tags', function ($query) {
            $query->where([
                ['name', '=', "Gallery"]
            ]);
        })
            ->whereHas("tags", function ($query) use ($tag){
                $query->where([
                    ['name', '=', $tag]
                ]);
            })
            ->with("tags")->orderBy("id", "desc")->get();

        return $posts;
    }

    public function shopTags()
    {
        $value = "Shop";

        $posts = Post::whereHas('tags', function ($query) use ($value) {
            $query->where('name', '=', $value);
        })->with("tags")->get();

        $tags = [];

        foreach($posts as $post) {
            foreach($post->tags()->get() as $tag) {

                if (in_array($tag->name, $tags)) {
                    continue;
                }

                $tags[] = $tag;
            }
        }

        //TODO make new and sale go to top of list

        return (new Collection($tags))->unique();
    }

    public function galleryTags()
    {
        $value = "Gallery";

        $posts = Post::whereHas('tags', function ($query) use ($value) {
            $query->where('name', '=', $value);
        })->with("tags")->get();

        $tags = [];

        foreach($posts as $post) {
            foreach($post->tags()->get() as $tag) {

                if (in_array($tag->name, $tags)) {
                    continue;
                }

                $tags[] = $tag;
            }
        }

        //TODO make new and sale go to top of list

        return (new Collection($tags))->unique();
    }

    public function search($string)
    {
        $matches = Post::where("title", "LIKE", "%{$string}%")
            ->orWhere("content", "LIKE", "%{$string}%")
            ->orWhereHas("tags", function ($query) use ($string) {
                $query->where("name", "LIKE", "%{$string}%");
            })->with("tags", "images.prices")->orderBy("id", "desc")->get();


        return $matches;
    }
}
