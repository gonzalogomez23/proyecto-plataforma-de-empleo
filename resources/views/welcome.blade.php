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
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col gap-12 sm:justify-center items-center">
            <h2 class="inline-flex items-baseline gap-4 font-semibold text-4xl text-gray-800">¡Welcome to <x-application-logo />!</h2>

            <div class="flex gap-3">
                <a href="{{route('login')}}">
                    <x-secondary-button >
                        {{ __('Log in') }}
                    </x-secondary-button>
                </a>
                <a href="{{route('register')}}">
                    <x-primary-button >
                        {{ __('Register') }}
                    </x-primary-button>
                </a>
            </div>
        </div>
    </body>
</html>
