<?php

namespace App\Http\Controllers\Products;

use App\Class\Repositories\Products\ProductRepository;
use App\Class\Repositories\Products\ProductRepositoryInterface;
use App\Class\Services\Products\ProductImageService;
use App\Class\Services\Products\ProductService;
use App\Http\Controllers\BaseController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $productRepository;
    protected $productService;
    protected $productImageService;

    public function __construct(
        ProductImageService $productImageService,
        ProductService $productService,
        ProductRepository $productRepository,
    ) {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
        $this->productImageService = $productImageService;
    }

    public function list()
    {
        $products = $this->productService->list();

        $subCategory = $this->productService->getSubCategory();

        return view('store.product.list', ['products' => $products, 'subCategory' => $subCategory]);
    }

    public function create()
    {
        $subCategory = $this->productService->getSubCategory();

        return view('store.product.create', ['subCategory' => $subCategory]);
    }

    public function saveCreate(Request $request)
    {
        $this->productService->saveCreate($request);


        return redirect()->route('web.store.product.list');
    }

    public function product_detail($id)
    {
        $prImageDetail = $this->productImageService->product_detail($id);
       $prDetail = $this->productService->product_detail($id);
        return view('client.product.product_detail',[
            'prDetail'=>$prDetail,
            'prImageDetail'=>$prImageDetail
        ]);
    }
}
