<?php

namespace Abrorbekismoilov\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // You can register routes, views, migrations, etc. here
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
            __DIR__.'/Models/Comment.php' => app_path('Models/Comment.php'),
            // __DIR__.'/Traits/Commentable.php' => app_path('Traits/Commentable.php'),
        ], 'commentable-files');
    }

    public function register()
    {
        // Bind services into the container here
    }
}