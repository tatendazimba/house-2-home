<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Interfaces\TagInterface;
use App\Image;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    protected $tags;

    public function __construct(TagInterface $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagsList = $this->tags->index();

        return view("tags", compact("tagsList"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();

        $method = "POST";
        $url = route("tags.store");

        return view("tags-create", compact("tag", "method", "url"));

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
            'name' => 'required:max:255',
            'description' => 'required',
            'text_colour' => 'nullable',
            'image_one' => 'file|image|mimes:jpeg,png,gif,webp',
            'image_wide' => 'file|image|mimes:jpeg,png,gif,webp',
        ]);

        $payload = [
            "name" => $request->name,
            "description" => $request->description,
            'text_colour' => $request->input("text_colour"),
        ];

        if ($request->hasFile('image_one')) {

            $image_one = $validation['image_one'];

            $path = $image_one->store('photos', ['disk' => 'public']);

            $imagePath = public_path("uploads/{$path}");

            //
            $this->resizeImage($imagePath);

            $payload["image"] = $path;
        }

        if ($request->hasFile('image_wide')) {

            $image_wide = $validation['image_wide'];

            $path = $image_wide->store('photos', ['disk' => 'public']);

            $imagePath = public_path("uploads/{$path}");

            //
            $this->resizeImage($imagePath);

            $payload["image_wide"] = $path;

        }

        if ($this->tags->store($payload)) {
            return redirect(route("tags.index"));
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $method = "PUT";
        $url = route("tags.update", $tag);

        return view("tags-create", compact("tag", "method", "url"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        $validation = $request->validate([
            'name' => 'required:max:255',
            'description' => 'required',
            'text_colour' => 'nullable',
            'image_one' => 'file|image|mimes:jpeg,png,gif,webp',
            'image_wide' => 'file|image|mimes:jpeg,png,gif,webp',
        ]);

        $tag->name = $request->name;
        $tag->description = $request->description;

        if ($request->has("text_colour"))
            $tag->text_colour = $validation['text_colour'];

        if ($request->hasFile('image_one')) {

            $image_one = $validation['image_one'];

            $path = $image_one->store('photos', ['disk' => 'public']);

            $imagePath = public_path("uploads/{$path}");

            //
            $this->resizeImage($imagePath);

            $tag->image = $path;

        }

        if ($request->hasFile('image_wide')) {

            $image_wide = $validation['image_wide'];

            $path = $image_wide->store('photos', ['disk' => 'public']);

            $imagePath = public_path("uploads/{$path}");

            //
            $this->resizeImage($imagePath);

            $tag->image_wide = $path;

        }

        if ($tag->save()) {
            return redirect(route("tags.index"));
        }
        else {
            back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->tags->destroy($tag);

        return back();
    }

    public function resizeImage($path)
    {
        $image = \Intervention\Image\Facades\Image::make($path);

        // resize if one width or height is greater that 1500
        if ($image->width() > 1500) {
            $image->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save($path);
        }

        $image = \Intervention\Image\Facades\Image::make($path);

        // resize if one width or height is greater that 1500
        if ($image->height() > 1500) {
            $image->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save($path);
        }

        return $image;

    }
}
