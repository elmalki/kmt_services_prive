<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $supported = Config::get('locales.supported', ['fr']);
        $locale = session('locale', Config::get('app.locale'));

        if (! in_array($locale, $supported, true)) {
            $locale = Config::get('app.fallback_locale');
        }

        App::setLocale($locale);

        // Optional: set Carbon/Intl locale too
        app('translator')->setLocale($locale);
        setlocale(LC_TIME, $locale);

        return $next($request);
    }
}
