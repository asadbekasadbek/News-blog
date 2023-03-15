<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href=""
               class="inline-block m-3 px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
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
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
sdsd
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap" style="width: 300px">
                                    <div class="text-sm font-medium text-gray-900">
                                        <img style="width: 300px;height: 200px" src="https://source.unsplash.com/random/300x300/?2">
                                    </div>
                                </td>
                                <td   >
                                    <div class="dark:text-gray-100 overflow-scroll" style="width: 300px ; height: 200px" >

                                            justice. Six draw
                                            you him full not mean evil. Prepare garrets it expense windows shewing do an. She projection advantages
                                            resolution son indulgence. Part sure on no long life am at ever. In songs above he as drawn to. Gay was
                                            outlived peculiar rendered led six.


                                            thoroughly
                                            partiality considered on in estimating. Middletons acceptance discovered projecting so is so or. In or
                                            attachment inquietude remarkably comparison at an. Is surrounded prosperous stimulated am me discretion
                                            expression. But truth being state can she china widow. Occasional preference fat remarkably now projecting
                                            uncommonly dissimilar. Sentiments projection particular companions interested do at my delightful. Listening
                                            newspaper in advantage frankness to concluded unwilling.
                                        thoroughly
                                        partiality considered on in estimating. Middletons acceptance discovered projecting so is so or. In or
                                        attachment inquietude remarkably comparison at an. Is surrounded prosperous stimulated am me discretion
                                        expression. But truth being state can she china widow. Occasional preference fat remarkably now projecting
                                        uncommonly dissimilar. Sentiments projection particular companions interested do at my delightful. Listening
                                        newspaper in advantage frankness to concluded unwilling.
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
                                        <a  class="text-yellow-600 hover:text-yellow-700 cursor-pointer"
                                        >  Редактировать</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a @click="destroy(category.id)" class="text-red-600 hover:text-red-900 cursor-pointer"
                                        >Удалить</a>
                                    </div>
                                </td>

                            </tr>
                            </tbody>
                        </table>


                    </div>
        </div>
    </div>
</x-app-layout>
