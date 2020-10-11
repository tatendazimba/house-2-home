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
Route::get('/about', AboutController::class)->name("about");
Route::get('/privacy', PrivacyController::class)->name("privacy");
Route::get('/contact', ContactController::class)->name("contact");
Route::get('/checkout', CheckoutController::class)->name("checkout");
Route::get('/how-it-works', AboutController::class)->name("how.works");
Route::get('/shop/{tag}', "ShopController")->name("shop");
Route::any('/decor/furniture/{string?}/zw', SearchController::class)->name("search");
Route::get('/makeovers/{tag}', MakeoverController::class)->name("blog");
Route::get('/inspiration/{tag}', InspirationsController::class)->name("inspirations");
Route::get('/gallery/{tag}', GalleryController::class)->name("gallery");
Route::get('/decor-tips/{tag}', DecorController::class)->name("decor");
Route::get('/story/{post}', StoryController::class)->name("story");

Route::middleware(["auth"])->group(function () {

    Route::redirect("home", "stories");
    Route::resource("stories", ADMIN\StoryController::class);
    Route::resource("tags", ADMIN\TagController::class);
    Route::resource("images", ADMIN\ImageController::class);
    Route::post("/add/tag/{story}/{tag}", ADMIN\AddTagController::class)->name("add.tag");
    Route::post("/remove/tag/{story}/{tag}", ADMIN\DeleteTagController::class)->name("remove.tag");

    // display image
    Route::get("prices/set/{image}", "ADMIN\PricesController@edit")->name("prices.set");
    Route::delete("prices/{image}", "ADMIN\PricesController@destroy")->name("prices.delete");

    // set prices on image
    Route::post("prices/set/{image}", "ADMIN\PricesController@store")->name("prices.set");

    Route::get("/stories/per/{tag}", 'ADMIN\StoryController@findByTag')->name("stories.per");

});

Auth::routes();
