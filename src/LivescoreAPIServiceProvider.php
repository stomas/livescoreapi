<?php

namespace Stomas\Livescoreapi;

use Illuminate\Support\ServiceProvider;


class LivescoreAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Publishes config file.
        $this->publishes([
            __DIR__.'/config/livescore.php' => config_path('livescore.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
