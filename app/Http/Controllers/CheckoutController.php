<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
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

        $post = new Post();
        $shippingOptions = $this->postsRepo->shippingOptions();

        return view("checkout.index", compact("post", "shippingOptions"));
    }
}
