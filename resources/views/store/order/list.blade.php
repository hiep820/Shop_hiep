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
                        <table id="table-cate"
                            class="pt-2 space-y-10 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-base text-white bg-cyan-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        người tạo Order
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        trạng thái
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Thời gian
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Chi tiết
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-cate">
                                <?php $i = 1; ?>
                                @foreach ($order as $item)
                                    <tr
                                        class="bg-white  text-base border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $i++ }}
                                        </td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->name }}
                                        </td>
                                        <?php if ($item->StateName == "Bị hủy"){?>
                                        <td scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            style="color:#fa0000;">
                                            {{ $item->StateName }}
                                        </td>
                                        <?php }else{?>
                                        <td scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                            style="color:#1ad348;">
                                            {{ $item->StateName }}
                                        </td>
                                        <?php } ?>
                                        <td
                                        scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->create_at }}
                                    </td>

                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a class="btn btn-primary"
                                                href="{{ route('web.store.order.detail', $item->id) }}"
                                                style="color:rgb(11, 7, 255)">Xem chi tiết</i></a>
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
