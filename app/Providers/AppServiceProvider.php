<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Paginator::useBootstrap();
        view()->composer('layouts.site', function ($view) {
              $categories = Category::all();
              $view->with(compact('categories'));
        });

        view()->composer('section.popularPost', function ($view) {
            $popularPosts = Post::limit(4)->orderBy('view','desc')->get();
            $view->with(compact('popularPosts'));
        });
    }
}
