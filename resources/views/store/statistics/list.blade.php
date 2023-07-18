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
                        <form>

                            <b> Chọn ngày</b>&nbsp;&nbsp;
                            <input type="datetime-local" value="{{ $startTime }}" name="startTime"
                                style="height: 30px; width: 200px;">&nbsp;&nbsp;&nbsp;&nbsp;
                            <b> Đến ngày</b>&nbsp;&nbsp;
                            <input type="datetime-local" value="{{ $endTime }}" name="endTime"
                                style="height: 30px; width: 200px;"><br><br>
                            <button type="submit" class="bg-blue-600 text-white border border-gray-500 px-4 py-1"
                                style="border-radius:20px">Tìm kiếm</button>
                        </form><br><br>
                        <?php $a = $startTime; ?>
                        <table id="table-cate"
                            class="pt-2 space-y-10 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-base text-white bg-cyan-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        sản phẩm
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        số tiền bán được
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="table-cate">
                                <?php $summ = []; ?>
                                <?php if($a==null){?>
                                @foreach ($statisticalAll as $item)
                                    <tr
                                        class="bg-white  text-base border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->name }}</td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->price * $item->count }}đ<?php $summ[] = $item->price * $item->count; ?></td>
                                    </tr>
                                @endforeach
                                <?php } else { ?>
                                @foreach ($statistical as $items)
                                    <tr
                                        class="bg-white  text-base border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $items->name_pr }}</td>
                                        <td
                                            scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $items->price * $items->count }}đ<?php $summ[] = $items->price * $items->count; ?></td>
                                    </tr>
                                @endforeach

                                <?php }?>
                                <tr
                                    class="bg-white  text-base border-b text-black dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td
                                        scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <b>Tổng</b></td>
                                    <td
                                        scope="row"class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <b><?php echo array_sum($summ); ?>đ</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
