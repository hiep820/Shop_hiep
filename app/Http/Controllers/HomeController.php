<?php

namespace App\Http\Controllers;

use App\Class\Repositories\HomeRepository;
use App\Class\Repositories\Order\OrderDetailRepository;
use App\Class\Repositories\Order\OrderRepository;
use App\Class\Services\CartService;
use App\Class\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeRepository;
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $homeService;
    protected $cartService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        HomeRepository $homeRepository, OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository,HomeService $homeService, CartService $cartService
    )
    {
        $this->homeRepository = $homeRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->homeService = $homeService;
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list()
    {
        $menuTime=$this->homeService->getTime();
        $menu=$this->homeRepository->all();
        // dd($menu);
        $total=$this->cartService->sumCart();
        return view('client.home',[
            'menuTime'=>$menuTime,
            'menu'=>$menu,
            'total'=>$total
        ]);

    }
}
