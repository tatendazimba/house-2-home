<?php

namespace App\Http\Controllers\ADMIN;

use App\Image;
use App\Post;
use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new Price();
        $price->name = $request->name;
        $price->description = $request->description;
        $price->amount = $request->amount;
        $price->status = $request->status ? $request->status : "AVAILABLE";
        $price->x = $request->x;
        $price->y = $request->y;
        $price->image_id = $request->image_id ? $request->image_id : 1;

        try {
            // check id price id. if yes update price
            if ($request->has("id")) {
                $price = Price::find($request->id);

                $price->fill($request->all());

            }

            $price->saveOrFail();

            return response("SUCCESS");

        } catch (\Throwable $e) {
            return response("FAILED: {$e->getMessage()}");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Image $image)
    {
        $story = $image;

        $image = Image::with("prices")->find($image->id);

        $method = "PUT";
        $url = route("stories.update", $story);

        $allTags = [];

        return view("price-set", compact("image", "story", "method", "url", "allTags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Price::destroy($id);

        return response("SUCCESS");
    }
}
