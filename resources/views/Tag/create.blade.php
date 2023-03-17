<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto p-4 bg-white">
                    <div class="w-full md:w-1/2 lg:w-1/3 mx-auto my-12 text-center text-blue-600">
                        <h1 class="text-lg font-bold"> Create Tags </h1>
                        <form  action="{{route('tag.store')}}" method="post"  class="flex flex-col mt-4">
                            @csrf
                            <label for="lastname" class="text-sm">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="px-4 m-1 py-3 w-full rounded-md bg-blue-100 border-transparent focus:border-blue-500 focus:bg-white focus:ring-0 text-sm"
                                placeholder="Name"
                            />
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul >
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
                                Create Tags
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
