<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route; // Add this line

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = ['de', 'dk', 'ee', 'en', 'es', 'fi', 'fr', 'it', 'lu', 'ne', 'no', 'pt', 'se'];

        $uri = $request->getRequestUri();

        // Check if URI starts with '/pipedrive' and skip locale detection
        if (strpos($uri, '/pipedrive') === 0 || strpos($uri, '/contact') === 0 || strpos($uri, '/client-request') === 0) {
            return $next($request);
        }

        $locale = $request->segment(1);

        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            $preferredLocale = Session::get('locale') ?: substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $locale = in_array($preferredLocale, $availableLocales) ? $preferredLocale : 'en';

            App::setLocale($locale);
            Session::put('locale', $locale);

            // Redirect to include the locale in the URL
            return redirect("/$locale" . $request->getRequestUri());
        }

        // Check if the current route exists for the new locale
        $segments = $request->segments();
        $segments[0] = $locale;
        $newUrl = implode('/', $segments);

        if ($newUrl !== $request->getRequestUri() && !Route::has($request->route()->getName())) {
            return redirect()->route('home', ['locale' => $locale]);
        }

        return $next($request);
    }
}
