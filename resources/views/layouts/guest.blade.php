<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Media Atlas | Registration</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

    <h5 class="text-1xl font-bold text-gray-700 dark:text-gray-300 relative w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 ">
        Welcome!
        @if(request()->is('login')) Please Login
        @else() Please Register
        @endif
        to continue
        <button onclick="this.parentElement.style.display='none'"
                class="absolute top-2 right-0 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" style="margin-right: 20px">
            &#x2715;
        </button>
    </h5>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
</body>
</html>
