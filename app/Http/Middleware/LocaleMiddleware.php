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
        $domain = $request->getHost();
        $tld = substr(strrchr($domain, '.'), 1);

        // Mapping: TLD => erlaubte Sprachen
        $tldLocales = [
            'at' => ['de'],
            'ch' => ['de', 'fr', 'it'],
            'dk' => ['dk', 'no', 'se', 'fi'],
            'it' => ['it'],
            'nl' => ['nl'],
            'pt' => ['pt'],
            'uk' => ['en'],
        ];

        $defaultLocale = [
            'at' => 'de',
            'ch' => 'de',
            'dk' => 'dk',
            'it' => 'it',
            'nl' => 'nl',
            'pt' => 'pt',
            'uk' => 'en',
        ];

        $allowedLocales = $tldLocales[$tld] ?? ['en'];
        $locale = $request->segment(1);
        $isAllowed = in_array($locale, $allowedLocales);
        $mainLocale = $defaultLocale[$tld] ?? 'en';

        // Wenn Sprache in der URL nicht erlaubt ist, redirect auf Hauptsprache
        if (!$isAllowed) {
            $newUri = $request->getRequestUri();
            // Entferne evtl. vorhandene falsche Sprachsegmente
            $segments = $request->segments();
            if (count($segments) > 0 && strlen($segments[0]) == 2) {
                array_shift($segments);
            }
            array_unshift($segments, $mainLocale);
            $newUrl = '/' . implode('/', $segments);
            return redirect($newUrl);
        }

        \App::setLocale($locale);
        // Keine Browsersprache, keine Session!
        return $next($request);
    }
}
