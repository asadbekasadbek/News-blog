<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right m-2">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="max-w-screen-lg mx-auto">
        <!-- header -->
        <header class="flex items-center justify-between py-2">
            <a href="/" class="px-2 lg:px-0 font-bold">
                Tech Blog
            </a>
            <button class="block md:hidden px-2 text-3xl">
                <i class='bx bx-menu'></i>
            </button>
            <ul class="hidden md:inline-flex items-center">
                <li class="px-2 md:px-4">
                    <a href="/" class="text-green-800 font-semibold hover:text-green-600"> Home </a>
                </li>
            </ul>

        </header>
        <!-- header ends here -->

        <main class="mt-10">

            <div class="mb-4 md:mb-0 w-full mx-auto relative">
                <div class="px-4 lg:px-0">
                    <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                        Pellentesque a consectetur velit, ac molestie ipsum. Donec sodales, massa et auctor.
                    </h2>
                </div>

                <img src="https://images.unsplash.com/photo-1587614387466-0a72ca909e16?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80" class="w-full object-cover lg:rounded" style="height: 28em;"/>
            </div>

            <div class="flex flex-col lg:flex-row lg:space-x-12">

                <div class="px-4 lg:px-0 mt-12 text-center text-gray-700 text-lg leading-relaxed w-full">
                    <p class="pb-6">Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is
                        justice. Six draw
                        you him full not mean evil. Prepare garrets it expense windows shewing do an. She projection advantages
                        resolution son indulgence. Part sure on no long life am at ever. In songs above he as drawn to. Gay was
                        outlived peculiar rendered led six.</p>

                    <p class="pb-6">Difficulty on insensible reasonable in. From as went he they. Preference themselves me as
                        thoroughly
                        partiality considered on in estimating. Middletons acceptance discovered projecting so is so or. In or
                        attachment inquietude remarkably comparison at an. Is surrounded prosperous stimulated am me discretion
                        expression. But truth being state can she china widow. Occasional preference fat remarkably now projecting
                        uncommonly dissimilar. Sentiments projection particular companions interested do at my delightful. Listening
                        newspaper in advantage frankness to concluded unwilling.</p>


                </div>



            </div>
        </main>
        <!-- main ends here -->
        <div class="flex justify-center space-x-1 dark:text-gray-100">
            <button title="previous" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow-md dark:bg-gray-900 dark:border-gray-800">
                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button type="button" title="Page 1" class="inline-flex items-center justify-center w-8 h-8 text-sm font-semibold border rounded shadow-md dark:bg-gray-900 dark:text-violet-400 dark:border-violet-400">1</button>
            <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm border rounded shadow-md dark:bg-gray-900 dark:border-gray-800" title="Page 2">2</button>
            <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm border rounded shadow-md dark:bg-gray-900 dark:border-gray-800" title="Page 3">3</button>
            <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm border rounded shadow-md dark:bg-gray-900 dark:border-gray-800" title="Page 4">4</button>
            <button title="next" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow-md dark:bg-gray-900 dark:border-gray-800">
                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>
        <!-- footer -->

    </div>
    </body>
</html>
