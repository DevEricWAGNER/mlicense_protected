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
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <div class="min-h-full">
                <div class="flex flex-col items-center justify-center gap-12 p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-5xl font-bold text-center">{{ __('Vous ne pouvez pas accéder à cette page') }}</h3>
                    <h4 class="text-4xl font-bold text-center text-red-500 underline">{{ __('Erreur 403') }}</h4>
                    <a href="{{ route('home') }}" class="px-4 py-2 text-2xl text-center text-blue-700 bg-blue-300 rounded-md w-fit hover:text-orange-700 hover:bg-orange-300">Retour à l'accueil</a>
                </div>
            </div>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>

