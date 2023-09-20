<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
           $tags = Tag::all();
            $view->with('tags', $tags);
        });
        View::composer('*', function ($view) {
           $mainCategories = Category::all()->where('parent_id','=',null);
            $view->with('mainCategories', $mainCategories);
        });
        View::composer('*', function ($view) {
            $recentPost = Post::latest()->first();
            $view->with('recentPost', $recentPost);
        });
        View::composer('*', function ($view) {
            $recentPosts = Post::latest()->take(5)->get();
            $view->with('recentPosts', $recentPosts);
        });
    }
}
