<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News blag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('news-blog.create')}}"
               class="inline-block m-3 px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-lg transition duration-150 ease-in-out">
                Create New
            </a>


            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    images
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    descriptions
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Смотреть комменты
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Редактировать
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Удалить
                                </th>

                            </tr>

                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($new_blogs as $value )
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                       {{$value->title}}
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap" style="width: 300px">
                                    <div class="text-sm font-medium text-gray-900">
                                        <img style="width: 300px;height: 200px" src="storage/{{$value->image}}">
                                    </div>
                                </td>
                                <td   >
                                    <div class="dark:text-gray-100 overflow-scroll" style="width: 300px ; height: 200px" >

                                        {{$value->description}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a  class="text-green-600 hover:text-green-700 cursor-pointer"
                                        > Смотреть комменты</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a href="{{route('news-blog.edit',$value->id)}}" class="text-yellow-600 hover:text-yellow-700 cursor-pointer"
                                        >  Редактировать</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <form action="{{route('news-blog.destroy',$value->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                        <button type="submit"  class="text-red-600 hover:text-red-900 cursor-pointer"
                                        >Удалить</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
