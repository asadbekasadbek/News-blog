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
                    <form action="{{route('category')}}" method="post"  class="grid justify-end">
                        @csrf
                        <select name="category_id"
                        >
                            @foreach(App\Models\Category::all() as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                        <button
                            type="submit"
                            class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent  bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex   justify-center  font-medium focus:outline-none"
                        >
                            поиск по категории
                        </button>
                    </form>
                        <div class="mb-4 md:mb-0 w-full mx-auto relative">
                            <div class="px-4 lg:px-0">
                                <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                                    {{$new->title}}
                                </h2>
                            </div>

                            <img src="/storage/{{$new->image}}" class="w-full object-cover lg:rounded"
                                 style="height: 28em;"/>
                        </div>
                        <div class="mb-4 md:mb-0 w-full mx-auto relative">
                            TAGS:
                            @foreach(App\Models\NewsBlog::find($new->id)->tags as  $itme)

                                <a style="color: #2563eb; text-decoration: underline;" href="{{route('tags',$itme->id)}}"> &nbsp#{{$itme->name}} </a>
                            @endforeach
                        </div>
                        <div class="flex flex-col lg:flex-row lg:space-x-12">

                            <div class="px-4 lg:px-0 mt-12 text-center text-gray-700 text-lg leading-relaxed w-full">
                                <p class="pb-6">{{$new->description}}</p>
                            </div>
                        </div>
                        @if(auth()->check())
                            <details>
                                <summary class="py-2 outline-none cursor-pointer focus:underline">
                                    создать комментарий
                                </summary>
                                <div class="px-4 pb-4">
                                    <form action="{{route('comment.store',$new->id)}}" method="post">
                                        @csrf
                                        <textarea name="description"
                                                  class="px-4 m-1 py-3 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0 text-sm"
                                                  placeholder="description"></textarea>
                                        <button
                                            type="submit"
                                            class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent  bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex  w-full justify-center  font-medium focus:outline-none"
                                        >
                                            Создать комментарий
                                        </button>
                                    </form>
                                </div>
                            </details>
                        @else
                            <h6 class="py-2 outline-none cursor-pointer focus:underline">
                                для созданий комментарий
                            </h6>
                            <a href="{{ route('login') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Авторизоваться |</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class=" font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">регистрировать</a>
                            @endif
                        @endif


                        @foreach($new->comments as $value)
                            <div
                                class="container flex flex-col w-full ">
                                <div class="flex justify-between p-4">
                                    <div class="flex space-x-4">
                                        <div>
                                            <img src="https://source.unsplash.com/100x100/?portrait" alt=""
                                                 class="object-cover w-12 h-12 rounded-full dark:bg-gray-500">
                                        </div>
                                        <div class="m-1">
                                            <h4 class="font-bold"></h4>
                                            <span
                                                class="ml-2 text-xs dark:text-gray-400">{{App\Models\User::findOrFail($value->user_id)->name}}</span>
                                        </div>
                                    </div>
                                    @can('destroy-comments',$value)
                                        <div class="flex items-center space-x-2 dark:text-yellow-500">


                                            <div class="text-sm font-medium text-gray-900">
                                                <form action="{{route('comment.destroy',$value->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            class="text-red-600 hover:text-red-900 cursor-pointer"
                                                    >Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endcan

                                </div>
                                <div class="p-4 space-y-2 text-sm dark:text-gray-400">
                                    <p>{{$value->description}}</p>

                                    @can('update-comments',$value)
                                        <details>
                                            <summary class="py-2 outline-none cursor-pointer focus:underline">
                                                Редактировать
                                            </summary>
                                            <div class="px-4 pb-4">
                                                <form action="{{route('comment.update',$value->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <textarea name="description"
                                                              class="px-4 m-1 py-3 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0 text-sm"
                                                              placeholder="description">{{App\Models\Comment::findOrFail($value->id)->description}}</textarea>
                                                    <button
                                                        type="submit"
                                                        class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent  bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex  w-full justify-center  font-medium focus:outline-none"
                                                    >
                                                        Edit Comment
                                                    </button>
                                                </form>
                                            </div>
                                        </details>
                                    @endcan
                                </div>
                            </div>
                        @endforeach

                </main>


            </div>
        </div>

    </main>


</div>
</body>
</html>
