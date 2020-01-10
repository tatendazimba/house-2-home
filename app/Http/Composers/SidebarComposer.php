<?php
/**
 * Created by PhpStorm.
 * User: tat-nda
 * Date: 3/1/19
 * Time: 12:12 PM
 */

namespace App\Http\Composers;


use App\Http\Controllers\Repositories\PostsRepository;
use App\Http\Controllers\Repositories\ProductRepository;
use App\Http\Controllers\Repositories\TagRepository;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class SidebarComposer
{

    protected $tags;
    protected $posts;

    public function __construct(TagRepository $tags, PostsRepository $posts)
    {
        $this->tags = $tags;
        $this->posts = $posts;
    }

    public function compose(View $view)
    {
        $popularTags = $this->tags->popular()->reverse();
        $allTags = $this->tags->all();
        $popularStories =  new Collection([]);

        $view->with("popularTags", $popularTags);
        $view->with("popularStories", $popularStories);
        $view->with("allTags", $allTags);
    }
}
