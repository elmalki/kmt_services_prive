<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Inertia::share([
            'locale' => fn () => App::getLocale(),
            'locales'  => fn () => Config::get('locales.supported', ['fr']),
            'translations' => function () {
                $locale = App::getLocale();
                $path = resource_path("lang/{$locale}/app.php");

                return file_exists($path) ? require $path : [];
            },
            ]);
    }
}
