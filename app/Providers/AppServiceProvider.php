<?php

namespace App\Providers;

use App\Theme;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::environment("production")) {
            URL::forceScheme("https");
        }

        View::composer("layouts.app", function($view) {
            $view->with("themes", Theme::all());
        });
    }
}
