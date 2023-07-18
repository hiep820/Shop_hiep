<?php

namespace App\Http\Controllers;

use App\Class\Repositories\CartRepository;
use App\Class\Repositories\Order\OrderDetailRepository;
use App\Class\Repositories\Order\OrderRepository;
use App\Class\Services\OrderDetailService;
use App\Class\Services\OrderService;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    protected $orderDetailService;
    protected $orderService;
    protected $orderRepository;
    protected $cartRepository;
    protected $orderDetailRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailService $orderDetailService,
        OrderService $orderService,
        CartRepository $cartRepository,
        OrderDetailRepository $orderDetailRepository,
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailService = $orderDetailService;
        $this->cartRepository = $cartRepository;
        $this->orderService = $orderService;
        $this->orderDetailRepository = $orderDetailRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $order=$this->orderService->detail($id);
        $orderDetail=$this->orderDetailService->detail($id);
        return view('store.order.detail', ['orderDetail' => $orderDetail,"order"=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->orderDetailService->store($request);
        return redirect()->route('web.client.home.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
