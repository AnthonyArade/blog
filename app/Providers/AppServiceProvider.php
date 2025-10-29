<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
         Gate::define('acces-article',function (User $user,Article $article) {
            return $user->id === $article->user_id;
        });

        Gate::define('acces-comment',function (User $user,$comment) {
            return $user->id == $comment->user_id;
        });

    }
}
