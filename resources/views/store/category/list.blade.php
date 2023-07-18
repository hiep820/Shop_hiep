@extends('store.layout.index')

@section('content')
    <div class="flex flex-col bg-blue-gray-50 h-full w-full py-4">
        <div class="flex px-2 flex-row relative">
            <div class="absolute left-5 top-3 px-2 py-2 rounded-full bg-cyan-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text"
                class="bg-white rounded-3xl shadow text-lg full w-full h-16 py-4 pl-16 transition-shadow focus:shadow-2xl focus:outline-none"
                placeholder="Cari menu ..." x-model="keyword" />
        </div>
        <div class="h-full overflow-hidden mt-4">
            <div class="h-full overflow-y-auto px-2">
                <div class=" mt-12">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <a href="{{ route('web.store.category.create') }}"
                            class="z-10 flex space-x-4 px-2 py-1 bg-green-500 border border-gray-300 rounded-md absolute right-0">
                            <p class="text-black text-sm">Create new</p>
                            <img src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u131.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                alt="">
                        </a>
                        <table id="table-cate"
                            class="pt-2 space-y-10 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-base text-white bg-cyan-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Category name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Sub-Category
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Description
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-cate">
                                @foreach ($parentCategories as $parentCategory)
                                    <tr
                                        class="bg-white  text-base border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $parentCategory->name }}
                                        </td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $parentCategory->slug }}
                                        </td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <p>{{ $parentCategory->description }}</p>
                                        </td>
                                        <td class="py-10 px-6 flex space-x-6">
                                            <a href="{{ route('web.store.category.update', $parentCategory->id) }}">
                                                <img width="32px"
                                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/category_management/u109.svg?pageId=c661d48f-a126-4bc4-b446-306b40de5021"
                                                    alt="">
                                            </a>
                                            <a href="">
                                                <img width="32px"
                                                    src="https://d1icd6shlvmxi6.cloudfront.net/gsc/YX3NNB/b6/de/a7/b6dea7057dc849ddb4efc5c7ac6a3af3/images/create_category/u45.svg?pageId=fc344ff3-0f48-40b8-905b-b57fafc3e11c"
                                                    alt="">
                                            </a>
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
@endsection
