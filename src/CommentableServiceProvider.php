<?php

namespace Abrorbekismoilov\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        
    }
}