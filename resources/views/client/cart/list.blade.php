<div class=" w-full ">
    <div class="bg-cyan-500"
        style="position: fixed;background-color: #fff;  top: 0; left: 0; height: 60px; width: 100%;  font-size: 40px ">
        <div style="float: left; width: 40%;">
            <a>Trở về</a>
        </div>
        <div style="float: left; width: 60%;">
            <b class="" style=";color: #9C8850; padding-top: 20px;">Product Order</b>
        </div>
        <hr>
    </div><br><br><br>
    <form action="{{ route('web.client.cart.store') }}" method="POST" class="w-8/12 ml-24 mt-5"
        enctype="multipart/form-data">
        @csrf
        @foreach ($cart as $item)
            <div class="input-group" style="width:100%;">
                <div style="font-size: 30px ;float: left; width: 10%;">
                    <div style=" float:left; width: 100%; ">
                        No <input name="name" value="{{ $item->id }}"
                            style="border: none;font-size: 30px ;width: 30px;">
                    </div>
                </div>
                <div style=" float:left; width: 60%; ">
                    <div style=" width: 100%; ">
                        <input name="name" value="{{ $item->name }}" style="border: none;font-size: 30px ;">
                    </div>
                    <div style="font-size: 10px; width: 100%; ">
                        <input id="price" class="price" name="price" value="{{ $item->price }}"
                            style="border: none;font-size: 20px ;width: 35px;"><span
                            style="border: none;font-size: 20px ;">$ (Tax included)</span>
                    </div>
                </div>
                <div style=" float:left; width: 30%; padding-top: 50px">
                    <div style="float: left; width: 34%; height: 7%; ">
                        <span id="add-item-btn" onclick="increment()" style="background:#ffffff;border: none;">
                            <img src="/icon/plus.png" width="30%" height="30%">
                        </span>
                    </div>
                    <div style="float: left; width: 36%; ">
                        <input name="quantity" type="number" id="quantity" class="quantity" style=" border:none;font-size: 30px;"
                            value="{{ $item->quantity }}">
                    </div>
                    <div style=" float: left; width: 30%;  height: 7%;">
                        <span>
                            <span onclick="decrement()" style="background:#ffffff;border: none;">
                                <img src="/icon/minus.png" width="30%" height="30%">
                            </span>
                        </span>
                    </div>
                </div>
                <hr>
            </div>
            <script>
                function increment() {
                    var price = document.getElementById("price");
                    var quantitySpan = document.getElementById('quantity');
                    quantitySpan.value++;
                    price.value = quantitySpan.value * {{ $item->price }};
                }

                function decrement() {
                    var price = document.getElementById("price");
                    var quantitySpan = document.getElementById('quantity');
                    if (quantitySpan.value > 1) {
                        quantitySpan.value--;
                        price.value = (quantitySpan.value * {{ $item->price }});
                    }
                }
            </script>
        @endforeach
        <div style="width: 100%;">
            <button type="submit"
                style=" position: fixed; font-size: 20px; padding: 10px 40%; margin-left: 110px; background-color: #9C8850;bottom:0;">Order
                now</button>
        </div>
    </form>
</div>
