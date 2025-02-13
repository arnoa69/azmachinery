<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="theme-color" content="#ED1D2A" media="(prefers-color-scheme: light)">
        <meta name="theme-color" content="#333" media="(prefers-color-scheme: dark)">
        <meta name="googlebot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">
        <meta name="robots" content="index,follow">
        <meta name="bingbot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">

        <title inertia></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- CSS Files -->
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="/img/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/img/favicon.svg" />
        <link rel="shortcut icon" href="/img/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png" />
        <link rel="manifest" href="/img/site.webmanifest" />

        <!-- Scripts -->
        {{-- <script defer src="https://app.fastbots.ai/embed.js" data-bot-id="cm45i90e50iehsvbm925x79ow"></script> --}}

        @routes
        @vite([
            "resources/js/app.js",
            "resources/js/script.js",
            "resources/css/app.css"
            ])
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_TAG_MANAGER_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', '{{ env('GOOGLE_TAG_MANAGER_ID') }}');
        </script>

        @inertiaHead

    </head>
    <body class="font-sans antialiased">
        @inertia
        {{-- <iframe height="430" width="350" src="https://bot.dialogflow.com/b6f946f8-8d9e-44c1-a415-557fe9271adf"></iframe> --}}
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        {{-- <script src="//code.tidio.co/0mn3fwe8cn5durrviayagljwaupvqsjv.js" async></script> --}}
    </body>
</html>
