<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="accessibility()"
      x-init="init()">

<head>
    <meta charset="utf-8">

    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-orange.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-blue.svg" media="(prefers-color-scheme: dark)">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gentle Care') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="overflow-y-auto pt-[78px] bg-cover bg-center bg-no-repeat bg-fixed">

    <div class="fixed inset-0 -z-10">
        <img src="/assets/images/background-light.png"
             class="w-full h-full object-cover dark:hidden">

        <img src="/assets/images/background.png"
             class="hidden dark:block w-full h-full object-cover">
    </div>

    <div class="min-h-screen">
        @include('layouts.navigation')

        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>