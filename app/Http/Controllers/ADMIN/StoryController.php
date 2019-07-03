<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Http\Controllers\Interfaces\TagInterface;
use App\Image;
use App\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoryController extends Controller
{

    protected $repo;
    protected $tags;

    public function __construct(PostsInterface $repo, TagInterface $tags)
    {
        $this->repo = $repo;
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = $this->repo->index();
        $allTags = $this->tags->all();

        return view("stories", compact("stories", "allTags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $story = new Post();

        $method = "POST";
        $url = route("stories.store");

        $allTags = $this->tags->all();

        return view("stories-create", compact("story", "method", "url", "allTags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required:max:255',
            'content' => 'required',
            'text_colour' => 'required',
            'image_one' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_two' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_three' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_four' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $payload = [
            "title" => $request->title,
            "content" => $request->input("content"),
            "text_colour" => $request->input("text_colour"),
        ];

        // new story
        $story = new Post();

        $story->fill($payload);

        // persist story
        $story = $this->repo->store($payload);

        // images to attach to post
        $images = [];

        if ($request->hasFile('image_one')) {

            $image_one = $validation['image_one'];

            $path = $image_one->store('photos', ['disk' => 'public']);

            // attach files to story
            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_two')) {
            $image_two = $validation['image_two'];

            $path = $image_two->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_three')) {
            $image_three = $validation['image_three'];

            $path = $image_three->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_four')) {
            $image_four = $validation['image_four'];

            $path = $image_four->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        // persist files
        if (count($images) > 0) {
            $story->images()->saveMany($images);
        }

        return redirect(route("stories.edit", $story));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $story)
    {

        $story = Post::with("tags")->find($story->id);

        $method = "PUT";
        $url = route("stories.update", $story);

        $allTags = $this->tags->all();

        return view("stories-create", compact("story", "method", "url", "allTags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $story)
    {

        $validation = $request->validate([
            'title' => 'required:max:255',
            'content' => 'required',
            'text_colour' => 'required',
            'image_one' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_two' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_three' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'image_four' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $story->title = $request->title;
        $story->content = $request->input("content");
        $story->text_colour = $request->input("text_colour");

        $story->update();
        $story->refresh();

        // images to attach to post
        $images = [];

        if ($request->hasFile('image_one')) {

            $image_one = $validation['image_one'];

            $path = $image_one->store('photos', ['disk' => 'public']);

            // attach files to story
            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_two')) {
            $image_two = $validation['image_two'];

            $path = $image_two->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_three')) {
            $image_three = $validation['image_three'];

            $path = $image_three->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        if ($request->hasFile('image_four')) {
            $image_four = $validation['image_four'];

            $path = $image_four->store("photos", ['disk' => 'public']);

            $images[] = new Image([
                "url" => $path
            ]);
        }

        // persist files
        if (count($images) > 0) {
            $story->images()->saveMany($images);
        }

        return back();
    }

    public function destroy(Post $story)
    {
        $this->repo->destroy($story);

        return back();
    }
}
