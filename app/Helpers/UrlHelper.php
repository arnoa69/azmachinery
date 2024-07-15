<?php
// app/Helpers/SlugHelper.php

namespace App\Helpers;

use Illuminate\Support\Str;

class UrlHelper
{
    protected static $validTypes = [
        'en' => [
            'mobile' => 'mobile',
            'static' => 'static',
            'container' => 'container',
        ],
        'de' => [
            'mobile' => 'mobil',
            'static' => 'fix',
            'container' => 'container',
        ]
    ];

    protected static $validVersions = [
        'en' => [
            'standard' => 'standard-size',
            'llo' => 'long-leveler-off',
            'xl' => 'extra-large',
            'llo_xl' => 'long-leveler-off-extra-large',
        ],
        'de' => [
            'standard' => 'standard-groesse',
            'llo' => 'ausfahrende-verlaengerung',
            'xl' => 'extra-lang',
            'llo_xl' => 'ausfahrende-verlaengerung-extra-lang',
        ],
    ];

    protected static $validOptions = [
        'en' => [
            'zr' => 'zone-refuge',
            'rl' => 'side-railings',
            'e' => 'electric',
            'ff' => 'fork-slider',
            'gal' => 'full-galvanized',
            'tb' => 'tarpaulin-tunnel',
        ],
        'de' => [
            'zr' => 'sicherheitszone',
            'rl' => 'seitengelaender',
            'e' => 'elektrisch',
            'ff' => 'gabelschieber',
            'gal' => 'vollverzinkt',
            'tb' => 'planendach',
        ],
    ];

    public static function validateUrlComponents($locale, $type, $version, $options)
    {
        // Validate type
        if (!in_array($type, self::$validTypes[$locale])) {
            return false;
        }

        // Validate version
        if (!in_array($version, self::$validVersions[$locale])) {
            return false;
        }

        // Validate options
        $validOptions = array_values(self::$validOptions[$locale]);
        if ($options) {
            foreach (explode('/', $options) as $option) {
                if (!in_array($option, $validOptions)) {
                    return false;
                }
            }
        }
        return true;
    }

    public static function generateUrl($slug, $locale = 'en')
    {
        $parts = explode('-', $slug);

        // Ensure correct indexing for type and version
        $typeKey = $parts[1] ?? null;
        $versionKey = $parts[2] ?? null;

        $type = self::$validTypes[$locale][$typeKey] ?? null;
        $version = self::$validVersions[$locale][$versionKey] ?? null;

        if (!$type || !$version) {
            throw new \Exception('Invalid type or version in slug');
        }

        // Handle options, if present
        $options = array_slice($parts, 3);
        $translatedOptions = implode('/', array_map(fn($opt) => self::$validOptions[$locale][$opt] ?? '', $options));
        $optionsPath = $translatedOptions ? "/$translatedOptions" : '';

        return "/$locale/$type/$version$optionsPath/$slug";
    }
}
