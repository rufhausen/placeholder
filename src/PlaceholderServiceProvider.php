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
            __DIR__ . '/config/placeholder.php' => config_path('placeholder.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('placeholder', function () {
            return new Placeholder;
        });
    }
}
