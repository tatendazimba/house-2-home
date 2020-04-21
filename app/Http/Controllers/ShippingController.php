<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    protected $postsRepo;

    public function __construct(PostsInterface $postsRepo)
    {
        $this->postsRepo = $postsRepo;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->json($this->postsRepo->shippingOptions());
    }
}
