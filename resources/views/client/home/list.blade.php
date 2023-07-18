@extends('client.layout.index')
@section('content')
    <div class="flex flex-col bg-blue-white-500 h-full w-full ">
        <div class="h-full overflow-hidden ">
            <div class="h-full overflow-y-auto">
                <div class=" pl-20 ">
                    <p><b>Dessert</b></p><br>
                    <table id="table-cate"
                        class=" pl-10 pt-2 space-y-10 w-full text-sm text-left text-gray-500 dark:text-gray-400"
                        style="width: 1300px;">
                        @foreach ($menu as $item)
                            <tr>
                                <th scope="col" class="py-3 px-6  py-4 "
                                    style="height: 120px; border: 6px solid #ddd4d4;31212;border-right: 0px solid;">
                                    <a href="{{ route('web.client.product.product_detail', $item->id) }}">
                                        <span class=" pl-10"><b>{{ $item->name }}</b></span><br>
                                        <p class=" pl-10">{{ $item->price }}$ (Tax included)</p>
                                    </a>
                                </th>
                                <th style="height: 120px; border: 6px solid #ddd4d4;border-left: 0px solid;">
                                    <a href="{{ route('web.client.product.product_detail', $item->id) }}">
                                        <img src="/images/{{ $item->avatar }}" alt="Áo đẹp" width="20%"
                                            class="thumbnail pt-4 pb-4 pr-20" style="float:right; border-radius: 15px;">
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        <tbody id="table-cate">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
