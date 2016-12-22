<?php

namespace Rufhausen\Placeholder;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PlaceholderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('placeholder.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('placeholder', function () {
            return new Placeholder;
        });

        $this->app->singleton('placeimage', function () {
            return new PlaceImage;
        });
    }
}
