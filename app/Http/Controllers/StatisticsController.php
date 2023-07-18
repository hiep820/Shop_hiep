<?php

namespace App\Http\Controllers;

use App\Class\Repositories\Order\OrderDetailRepository;
use App\Class\Repositories\Products\ProductRepository;
use App\Class\Services\OrderDetailService;
use App\Class\Services\Products\ProductService;
use App\Http\Requests\StatisticsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    protected $orderDetailService;
    protected $productRepository;
    protected $orderDetailRepository;
    protected $productService;

    public function __construct(

        ProductRepository $productRepository,
        OrderDetailService $orderDetailService,
        OrderDetailRepository $orderDetailRepository,
        ProductService $productService,
    ){

        $this->orderDetailService = $orderDetailService;
        $this->productRepository = $productRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $startTime = $request->get('time1');
        $endTime = $request->get('time2');
        $statistical=$this->orderDetailService->statistical($request);
        $statisticalAll=$this->orderDetailService->statisticalAll($request);
        $product=$this->productService->list();
        return view('store.statistics.list', [

            'product' => $product,
            'statistical'=>$statistical,
            'statisticalAll'=>$statisticalAll,
            'endTime'=>$endTime,'startTime'=>$startTime,

        ]);
    }
}
