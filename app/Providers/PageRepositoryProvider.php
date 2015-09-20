<?php


namespace app\Providers;

use Illuminate\Support\ServiceProvider;


class PageRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Contracts\PageRepositoryInterface', 'App\Repositories\PageRepository');
    }

}