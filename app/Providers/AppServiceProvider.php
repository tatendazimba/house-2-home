<?php

namespace App\Providers;

use App\Http\Composers\SidebarComposer;
use App\Http\Controllers\Interfaces\PostsInterface;
use App\Http\Controllers\Interfaces\RequestInterface;
use App\Http\Controllers\Interfaces\TagInterface;
use App\Http\Controllers\Repositories\PostsRepository;
use App\Http\Controllers\Repositories\RequestRepository;
use App\Http\Controllers\Repositories\TagRepository;
use App\Http\View\Composers\FooterComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share("colours", ["cyan lighten-3", "teal lighten-3", "orange lighten-3", "indigo lighten-3"]);

        $this->app->bind(PostsInterface::class, PostsRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(RequestInterface::class, RequestRepository::class);

        View::composer('*', SidebarComposer::class);
        View::composer('*', FooterComposer::class);
    }
}
