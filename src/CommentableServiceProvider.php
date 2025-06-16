<?php

namespace Abrorbekismoilov\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
            __DIR__.'/Models/Comment.php' => app_path('Models/Comment.php'),
        ], 'commentable-files');
    }

    public function register()
    {
        // Bind services into the container here
    }
}