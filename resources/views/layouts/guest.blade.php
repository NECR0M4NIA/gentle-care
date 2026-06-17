<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('/assets/images/forest-night.jpg');" class="bg-cover bg-center bg-no-repeat font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div>
            <a href="/">
                <img src="/assets/icons/gentle-care-orange.svg" width="96" class="block dark:hidden fill-current transition hover:opacity-[0.85]" />
                <img src="/assets/icons/gentle-care-blue.svg" width="96" class="hidden dark:block fill-current transition hover:opacity-[0.85]" />
            </a>
        </div>

        @if (request()->routeIs('register'))
        <p class="text-white dark:text-gray-200 italic mt-4 text-[1.5rem] drop-shadow-[0_2px_2px_rgba(0,0,0,0.8)]">Ayez votre propre espace de bien-être</p>
        @endif

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>