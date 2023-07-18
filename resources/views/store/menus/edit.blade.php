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

                <div class="container">
                    <div class="bg-cyan-700 px-5 py-2">
                        <p class="text-white font-semibold">Edit menus</p>
                    </div>
                    <form action="{{ route('web.store.menus.update', $menu->id_menu) }}" method="post"
                        enctype="multipart/form-data">
                        {{-- @method('PUT') --}}
                        @csrf
                        <div lass="form-group">
                            <label>menus Name:</label>
                            <div class="mt-2">
                                <input type="text" name="name_menu" class="w-full border border-gray-700"
                                    value="{{ $menu->name_menu }}">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label>Description:</label>
                            <div class=" mt-2">
                                <textarea type="text" name="description" class="w-full border border-gray-700">{{ $menu->description }}</textarea>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label>Starttime:</label>
                            <div class="mt-2">
                                <input type="time" name="starttime" class="w-full border border-gray-500"
                                    value="{{ $menu->starttime }}">
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label>Endtime:</label>
                            <div class="mt-2">
                                <input type="time" name="endtime" class="w-full border border-gray-500"
                                    value="{{ $menu->endtime }}">
                            </div>
                        </div><br>
                        <div class="flex">
                            <label>Chọn category:</label>
                            <div class="w-9/12 mt-4">
                                @foreach ($category as $item)
                                    <div>
                                        <input type="checkbox" name="category_id[]" value="{{ $item->id }}"
                                            @if (in_array($item->id, $ary)) checked @endif>
                                        <label>{{ $item->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-1/3 space-x-2 mt-5 float-right flex justify-end">
                            <button type="submit"
                                class="bg-green-600 text-white border border-gray-500 px-4 py-1">Submit</button>
                        </div>
                    </form>
                    <script></script>
                </div>

            </div>
        </div>
    </div>
@endsection
