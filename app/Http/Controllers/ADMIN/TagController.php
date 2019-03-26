<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Interfaces\TagInterface;
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
        $payload = [
            "name" => $request->name,
            "description" => $request->description
        ];

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
        $tag->name = $request->name;
        $tag->description = $request->description;

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
}
