<?php

namespace App\Http\Controllers;

use App\Class\Repositories\CartRepository;
use App\Class\Repositories\Products\ProductRepository;
use App\Class\Services\CartService;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    protected $productRepository;
    protected $cartRepository;
    protected $cartService;

    public function __construct(
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        CartService $cartService,

    ) {
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->cartService = $cartService;

    }

    function list(){
       $cart= $this->cartService->all();
        return view('client.cart.list',[
            'cart'=>$cart,
        ]);
   }

    function AddCart(request $r){
    	 $this->cartService->create($r);
        return redirect()->route('web.client.home.list');

    }
}
