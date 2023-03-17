<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
@if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right m-2">
        @auth
            <a href="{{ url('/dashboard') }}"
               class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}"
               class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
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

    </header>
    <!-- header ends here -->

    <main class="mt-10">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <main class="mt-10">
                    <section class="py-6 dark:bg-gray-800 dark:text-gray-100">
                        <div class="container p-4 mx-auto space-y-16 sm:p-10">
                            <div class="space-y-4 bg-gray-50 mb-4">
                                <h3 class="text-2xl font-bold leading-none sm:text-5xl">{{$category->name}}</h3>
                            </div>
                            @foreach($categories as $vale)
                                <section class="text-2xl font-bold leading-none sm:text-5xl">
                                    <a href="{{route('new',$vale->id)}}">
                                        <div class="container px-4 mx-auto">
                                            <div class="flex flex-wrap -m-8">
                                                <div class="w-full md:w-1/2 p-8">
                                                    <div class="flex flex-wrap lg:items-center -m-4">
                                                        <div class="w-auto p-4">
                                                            <div class="overflow-hidden rounded-xl">
                                                                <img
                                                                    class="transform hover:scale-105 transition ease-in-out duration-1000"
                                                                    src="/storage/{{$vale->image}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 p-4">
                                                            <div class="md:max-w-xs">
                                                                <div class="flex flex-col justify-between h-full">
                                                                    <div class="mb-6">
                                                                        <p class="mb-1.5 text-sm text-gray-500 font-medium uppercase tracking-px">{{$vale->title}}</p>
                                                                        <h3 class="text-xl font-semibold leading-normal">{{$vale->description}}</h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </section>
                            @endforeach
                        </div>
                    </section>
                </main>


            </div>
        </div>

    </main>


</div>
</body>
</html>

