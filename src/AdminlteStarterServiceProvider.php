<?php

namespace Janiscp\AdminlteStarter;

use Illuminate\Support\ServiceProvider;

class AdminlteStarterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->loadViewsFrom(__DIR__.'/views', 'adminlte');
    }
}
