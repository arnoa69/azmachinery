<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="theme-color" content="#ED1D2A">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="googlebot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">
        <meta name="robots" content="index,follow">
        <meta name="bingbot" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1">

        <title inertia>{{ __('Title Rampas Carga Moviles') }}</title>

        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link href="{{ asset('img/favicon.ico') }}" rel="icon">
        <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Scripts -->
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
        <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    </body>
</html>
