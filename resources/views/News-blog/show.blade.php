<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <main class="mt-10">

                <div class="mb-4 md:mb-0 w-full mx-auto relative">
                    <div class="px-4 lg:px-0">
                        <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
                            {{$new->title}}
                        </h2>
                    </div>

                    <img src="/storage/{{$new->image}}" class="w-full object-cover lg:rounded" style="height: 28em;"/>
                </div>

                <div class="flex flex-col lg:flex-row lg:space-x-12">

                    <div class="px-4 lg:px-0 mt-12 text-center text-gray-700 text-lg leading-relaxed w-full">
                        <p class="pb-6">{{$new->description}}</p>
                    </div>
                </div>
                @can('admin')
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
                                <div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="text-orange-700">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <button
                                    type="submit"
                                    class="mt-4 px-4 py-3  leading-6 text-base rounded-md border border-transparent  bg-blue-500 text-blue-100 hover:text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 cursor-pointer inline-flex  w-full justify-center  font-medium focus:outline-none"
                                >
                                    Создать комментарий
                                </button>
                            </form>
                        </div>
                    </details>
                @endcan
                @foreach($new->comments as $value)
                    <div
                        class="container flex flex-col w-full">
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
                            @can('moderator')
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
                            @endcan
                        </div>
                        <div class="p-4 space-y-2 text-sm dark:text-gray-400">
                            <p>{{$value->description}}</p>

                            @can('admin')
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
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li class="text-orange-700">{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
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
</x-app-layout>
