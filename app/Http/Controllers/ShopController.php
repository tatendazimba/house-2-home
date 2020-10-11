<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\PostsInterface;
use App\Tag;
use Illuminate\Support\Facades\App;

class ShopController extends Controller
{
    protected $posts;

    public function __construct(PostsInterface $posts)
    {
        $this->posts = $posts;
    }

    public function __invoke($tagParameter)
    {
        $heroes = $this->posts->heroes();
        $featured = $this->posts->inspiration();
        $categories = $this->posts->featuredCategories();
        $shopTags = $this->posts->shopTags();

        // TODO refactor this
        $tag = new Tag([
            "name" => "ALL"
        ]);

        if ($tagParameter === "ALL") {
            $shop = $this->posts->shop();
        }
        else if ($tagParameter === 'catalogue') {
            $shop = $this->posts->shop();
            
            $pdf = App::make('snappy.pdf.wrapper');
            $pdf->loadView('catalogue', compact("heroes", "featured", "categories", "shop", "shopTags", "tagParameter", "tag"));

            // return view("catalogue", compact("heroes", "featured", "categories", "shop", "shopTags", "tagParameter", "tag"));
            
            return $pdf
                ->setPaper('a4')
                ->setOption('cover', '<img alt="" class="full-width" src="/home/tat-nda/Lab/house-2-home/public/images/a4.jpg" style="width: 100%; height: auto;">')
                ->setOption('margin-bottom', 0)
                ->setOption('margin-top', 0)
                ->setOption('margin-right', 0)
                ->setOption('margin-left', 0)
                ->setOrientation('portrait')
                ->stream('catalogue.pdf');
    
        }
        else {
            $shop = $this->posts->shopWithTag($tagParameter);
            // TODO refactor this
            $tag = Tag::where("name", $tagParameter)->firstOrFail();
        }

        
        return view("shop", compact("heroes", "featured", "categories", "shop", "shopTags", "tagParameter", "tag"));
    }
}
