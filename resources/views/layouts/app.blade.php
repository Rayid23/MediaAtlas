<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 5 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Meta tags -->
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Современное веб-приложение на Laravel">
</head>

<body class="font-sans antialiased text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-950">
    <div class="min-h-screen flex flex-col">
        <!-- Навигация -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $header }}
                    </h1>
                    @isset($subheader)
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        {{ $subheader }}
                    </p>
                    @endisset
                </div>
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <x-application-logo class="h-8 w-auto text-gray-800 dark:text-gray-200" />
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                            © {{ date('Y') }} {{ config('app.name') }}. Все права защищены.
                        </span>
                    </div>
                    <nav class="mt-4 md:mt-0 flex space-x-6">
                        <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                            Политика конфиденциальности
                        </a>
                        <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                            Условия использования
                        </a>
                        <a href="#" class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition-colors">
                            Контакты
                        </a>
                    </nav>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>