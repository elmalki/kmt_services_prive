<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class LocaleController extends Controller
{
    public function update(Request $request)
    {
        $supported = Config::get('locales.supported', ['en']);
        $locale = $request->string('locale')->toString();

        if (! in_array($locale, $supported, true)) {
            abort(422, 'Unsupported locale.');
        }

        session(['locale' => $locale]);

        // Redirect back to where the user was (with Inertia-friendly back)
        return back();
    }
}

