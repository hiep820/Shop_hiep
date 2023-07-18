@extends('client.layout.index')
@section('content')
    <div class="flex flex-col bg-blue-gray-50 h-full w-full ">
        <div class="h-full overflow-hidden ">
            <div class="h-full overflow-y-auto" >
                <div >
                    @foreach ($menu as $item)
                        {{-- <div style="display: inline-flex;"> --}}
                        <a href="{{ route('web.client.product.product_detail', $item->id) }}" >
                            <img src="/images/{{ $item->avatar }}" alt="Áo đẹp" width="200px" class="thumbnail" >
                            <b><span>{{ $item->name }}</span><br>
                            <span>{{ $item->price }}đ</span></b>
                        </a>
                        {{-- </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
