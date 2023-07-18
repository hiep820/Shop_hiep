<link rel="stylesheet" href="/../css/style.css">
<div class=" w-full ">
    <div class="bg-cyan-500"
        style="position: fixed;background-color: #fff;  top: 0; left: 0; height: 60px; width: 100%;  font-size: 40px ">
        <a>
            Trở về
        </a>
        <b class="btn btn-primary text-left " style="margin-left: 40%;color: #9C8850;">{{ $prDetail->name }}</b>
    </div>
    <br><br>
    <form action="{{ route('web.client.cart.AddCart') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="h-full overflow-hidden ">
            <div class="slider" style="height: 100%;">
                @foreach ($prImageDetail as $iteam)
                    <div>
                        <img src="/images/{{ $iteam->path }}" alt="Áo đẹp" width="100%" class="thumbnail">
                    </div>
                @endforeach
            </div>
            {{-- <div class="slider">
                <img src="/images/7VqY5saTwz8iZESV5UifnFSoI5oOxIPZwUbr6kpb.jpg" alt="Slide 1">
                <img src="/images/7VqY5saTwz8iZESV5UifnFSoI5oOxIPZwUbr6kpb.jpg" alt="Slide 2">
                <img src="/images/7VqY5saTwz8iZESV5UifnFSoI5oOxIPZwUbr6kpb.jpg" alt="Slide 3">
              </div> --}}
            <div class="mb-5">
                <div class="input-group" style="float: left; width: 50%;">
                    <div style="font-size: 30px ">
                        <input name="name" value="{{ $prDetail->name }}" style="border: none;font-size: 30px ;">
                    </div>
                    <div style="font-size: 20px ">
                        <p><b><input name="price" type="number" id="price"
                                    style="color: #000000;font-size: 20px ;border:none; width: 40px;"
                                    value="{{ $prDetail->price }}">$ (Tax included)</b></p>
                    </div>
                    <div>
                        <p style="color: #000000;font-size: 20px ;">mã sp: <input
                                style="margin-left: 40px;color: #000000;font-size: 20px ;border:none;" type="text"
                                name="id" value="{{ $prDetail->id }}"></p>
                    </div>
                </div>
                <div class="input-group" style="float:right; width: 50%;">
                    <span class="input-group-btn" style="float:right;margin-right: 30px">
                        <span class="btn btn-primary" id="add-item-btn" onclick="increment()"
                            style="background:#ffffff;border: none;">
                            <img src="/icon/plus.png" width="100%" height="20px">
                        </span>
                    </span>

                    <input name="quantity" type="number" id="quantity"
                        style="font-size: 30px;float:right;margin-right: 20px; border:none;width: 50px;" value="1">
                    <span class="input-group-btn" style="float:right;margin-right: 50px;">
                        <span onclick="decrement()" style="background:#ffffff;border: none;">
                            <img src="/icon/minus.png" width="100%" height="20px">
                        </span>
                    </span>
                </div>
            </div>
            <div>
                &nbsp
            </div>
        </div><br>

        <div style="width: 100%;">
            <button type="submit"
                style="font-size: 20px; padding: 10px 40%; margin-left: 110px; background-color: #9C8850">Order</button>
        </div>
    </form>
</div>
<script>
    function increment() {
        var price = document.getElementById("price");
        var quantitySpan = document.getElementById('quantity');
        quantitySpan.value++;
        price.value = quantitySpan.value * {{ $prDetail->price }};
    }

    function decrement() {
        var price = document.getElementById("price");
        var quantitySpan = document.getElementById('quantity');
        if (quantitySpan.value > 1) {
            quantitySpan.value--;
            price.value = (quantitySpan.value * {{ $prDetail->price }});
        }
    }
</script>
<script>
    var slides = document.querySelectorAll('.slider img');
    var currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    setInterval(nextSlide, 500);
</script>
