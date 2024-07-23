<?php
// app/Helpers/SlugHelper.php

namespace App\Helpers;

use Illuminate\Support\Str;

class UrlHelper
{
    protected static $validTypes = [
        "en" => [
            "mobile" => "mobile-loading-ramp",
            "static" => "static",
            "container" => "container"
        ],
        "de" => [
            "mobile" => "mobile-laderampe",
            "static" => "fix",
            "container" => "container"
        ],
        "dk" => [
            "mobile" => "mobil-lasserampe",
            "static" => "fast",
            "container" => "container"
        ],
        "ee" => [
            "mobile" => "mobiilne-laadimisramp",
            "static" => "staatiline",
            "container" => "container"
        ],
        "es" => [
            "mobile" => "rampa-de-carga-movil",
            "static" => "estatico",
            "container" => "container"
        ],
        "fi" => [
            "mobile" => "siirrettava-lastausramppi",
            "static" => "staattinen",
            "container" => "container"
        ],
        "fr" => [
            "mobile" => "rampe-de-chargement-mobile",
            "static" => "statique",
            "container" => "container"
        ],
        "it" => [
            "mobile" => "rampa-di-carico-mobile",
            "static" => "statico",
            "container" => "container"
        ],
        "lu" => [
            "mobile" => "mobil-luedrampe",
            "static" => "statique",
            "container" => "container"
        ],
        "nl" => [
            "mobile" => "mobiele-laadramp",
            "static" => "statisch",
            "container" => "container"
        ],
        "no" => [
            "mobile" => "mobil-lasterampe",
            "static" => "statisk",
            "container" => "container"
        ],
        "pt" => [
            "mobile" => "rampa-de-carga-movel",
            "static" => "estatico",
            "container" => "container"
        ],
        "se" => [
            "mobile" => "mobil-lastningsramp",
            "static" => "statisk",
            "container" => "container"
        ]
    ];

    protected static $validVersions = [
        "en" => [
            "standard" => "standard-size",
            "llo" => "long-leveler-off",
            "xl" => "extra-large",
            "llo-xl" => "long-leveler-off-extra-large"
        ],
        "de" => [
            "standard" => "standard-groesse",
            "llo" => "ausfahrende-verlaengerung",
            "xl" => "extra-lang",
            "llo-xl" => "ausfahrende-verlaengerung-extra-lang"
        ],
        "dk" => [
            "standard" => "standard-storrelse",
            "llo" => "lang-udfyldning",
            "xl" => "ekstra-stor",
            "llo-xl" => "lang-udfyldning-ekstra-stor"
        ],
        "ee" => [
            "standard" => "vaikimisi-suurus",
            "llo" => "pikk-laiend-valja",
            "xl" => "ekstra-suur",
            "llo-xl" => "pikk-laiend-valja-ekstra-suur"
        ],
        "es" => [
            "standard" => "tamano-estandar",
            "llo" => "alargamiento-largo",
            "xl" => "extra-grande",
            "llo-xl" => "alargamiento-largo-extra-grande"
        ],
        "fi" => [
            "standard" => "normaali-koko",
            "llo" => "pidentavalennys",
            "xl" => "ekstra-suuri",
            "llo-xl" => "pidentavalennys-ekstra-suuri"
        ],
        "fr" => [
            "standard" => "taille-standard",
            "llo" => "extension-longue",
            "xl" => "tres-grand",
            "llo-xl" => "extension-longue-tres-grand"
        ],
        "it" => [
            "standard" => "dimensione-standard",
            "llo" => "allungamento-lunghezza",
            "xl" => "extra-grande",
            "llo-xl" => "allungamento-lunghezza-extra-grande"
        ],
        "lu" => [
            "standard" => "normale-grossezza",
            "llo" => "extension-longue",
            "xl" => "extra-gros",
            "llo-xl" => "extension-longue-extra-gros"
        ],
        "nl" => [
            "standard" => "standaard-grootte",
            "llo" => "lange-niveau-uit",
            "xl" => "extra-groot",
            "llo-xl" => "lange-niveau-uit-extra-groot"
        ],
        "no" => [
            "standard" => "standard-storrelse",
            "llo" => "lang-udfylding",
            "xl" => "ekstra-stor",
            "llo-xl" => "lang-udfylding-ekstra-stor"
        ],
        "pt" => [
            "standard" => "tamanho-padrao",
            "llo" => "alongamento-longo",
            "xl" => "extra-grande",
            "llo-xl" => "alongamento-longo-extra-grande"
        ],
        "se" => [
            "standard" => "standard-storlek",
            "llo" => "lang-utbyggnad",
            "xl" => "extra-stor",
            "llo-xl" => "lang-utbyggnad-extra-stor"
        ]

    ];

    protected static $validOptions = [
        'en' =>
            [
                'zr' => 'zone-refuge',
                'rl' => 'side-railings',
                'e' => 'electric',
                'ff' => 'fork-slider',
                'gal' => 'full-galvanized',
                'tb' => 'tarpaulin-tunnel',
            ],
        'de' =>
            [
                'zr' => 'sicherheitszone',
                'rl' => 'seitengelaender',
                'e' => 'elektrisch',
                'ff' => 'gabelschieber',
                'gal' => 'vollverzinkt',
                'tb' => 'planendach',
            ],
        'dk' =>
            [
                'zr' => 'sikkerhedszone',
                'rl' => 'sidegardiner',
                'e' => 'elektrisk',
                'ff' => 'skiftebærer',
                'gal' => 'fuld-forzinket',
                'tb' => 'tagtunnel',
            ],
        'ee' =>
            [
                'zr' => 'tervitsi-aladus',
                'rl' => 'poolkorvuti',
                'e' => 'elektriksne',
                'ff' => 'katkestaja-liikumisliidur',
                'gal' => 'taielik-verzinkitud',
                'tb' => 'tagukoog',
            ],
        'es' =>
            [
                'zr' => 'zona-refugio',
                'rl' => 'railes-laterales',
                'e' => 'electrico',
                'ff' => 'deslizador-de-bastidor',
                'gal' => 'totalmente-galvanizado',
                'tb' => 'tunel-tejado',
            ],
        'fi' =>
            [
                'zr' => 'suojausalue',
                'rl' => 'sivuseitit',
                'e' => 'sahkoinen',
                'ff' => 'kaaripistooli',
                'gal' => 'taysiksiveroitu',
                'tb' => 'paalattiatunnel',
            ],
        'fr' =>
            [
                'zr' => 'zone-refuge',
                'rl' => 'parapets-lateraux',
                'e' => 'electrique',
                'ff' => 'glissiere-baton',
                'gal' => 'totalement-galvanise',
                'tb' => 'tunnel-toit',
            ],
        'it' =>
            [
                'zr' => 'zona-rifugio',
                'rl' => 'parapetti-laterali',
                'e' => 'elettrico',
                'ff' => 'cambia-slittamento',
                'gal' => 'totalmente-galvanizzato',
                'tb' => 'tunnel-tetto',
            ],
        'lu' =>
            [
                'zr' => 'zone-refuge',
                'rl' => 'parapets-lateraux',
                'e' => 'electrique',
                'ff' => 'glissiere-baton',
                'gal' => 'totalement-galvanise',
                'tb' => 'tunnel-toit',
            ],
        'nl' =>
            [
                'zr' => 'zone-refugie',
                'rl' => 'rail-laterale',
                'e' => 'electrisch',
                'ff' => 'schuifbalk',
                'gal' => 'volledig-verzinkt',
                'tb' => 'dak-tunnel',
            ],
        'no' =>
            [
                'zr' => 'sikkerhetszone',
                'rl' => 'sidekanter',
                'e' => 'elektisk',
                'ff' => 'skifteskytter',
                'gal' => 'fullt-verzinket',
                'tb' => 'taggaller',
            ],
        'pt' =>
            [
                'zr' => 'zona-refugio',
                'rl' => 'parede-lateral',
                'e' => 'eletrico',
                'ff' => 'deslizador-do-eixo',
                'gal' => 'totalmente-galvanizado',
                'tb' => 'tunel-telhado',
            ],
        'se' =>
            [
                'zr' => 'sakerhetszon',
                'rl' => 'sidokanter',
                'e' => 'elektrisk',
                'ff' => 'vaxelskytt',
                'gal' => 'fullt-galvaniserad',
                'tb' => 'takkup',
            ],
    ];

    public static function validateUrlComponents($locale, $type, $version, $options = null)
    {
        // Validate type
        if (!in_array($type, array_values(self::$validTypes[$locale]))) {
            return false;
        }

        // Validate version
        if (!in_array($version, array_values(self::$validVersions[$locale]))) {
            return false;
        }

        // Validate options
        if ($options && $options !== 'no-option') {
            $validOptions = array_values(self::$validOptions[$locale]);
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
        $optionsPath = $translatedOptions ? "/$translatedOptions" : '/no-option';

        return "/$locale/$type/$version/$optionsPath/$slug";
    }
}
