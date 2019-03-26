<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Repositories\PostsRepository;
use App\Http\Controllers\Repositories\TagRepository;
use App\Post;
use App\Tag;

Route::get('/', HomeController::class)->name("home");
Route::get('/shop/{tag}', "ShopController")->name("shop");
Route::get('/makeovers/{tag}', MakeoverController::class)->name("blog");
Route::get('/inspiration/{tag}', InspirationsController::class)->name("inspirations");
Route::get('/gallery/{tag}', GalleryController::class)->name("gallery");
Route::get('/decor-tips/{tag}', DecorController::class)->name("decor");
Route::get('/story/{post}', StoryController::class)->name("story");

Route::resource("stories", ADMIN\StoryController::class);
Route::resource("tags", ADMIN\TagController::class);
Route::resource("images", ADMIN\ImageController::class);

Route::get("/stories/per/{tag}", function(Tag $tag){

    $repo = new PostsRepository(new Post(), new Tag());
    $tagsRepo = new TagRepository(new Tag());

    $stories = $repo->find($tag->name);
    $allTags = $tagsRepo->all();

    return view("stories", compact("stories", "allTags"));
})->name("stories.per");

Route::post("/add/tag/{story}/{tag}", ADMIN\AddTagController::class)->name("add.tag");
Route::post("/remove/tag/{story}/{tag}", ADMIN\DeleteTagController::class)->name("remove.tag");
