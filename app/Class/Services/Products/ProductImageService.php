<?php

namespace App\Class\Services\Products;

use App\Class\Repositories\Categories\CategoryRepository;
use App\Class\Repositories\Categories\CategoryRepositoryInterface;
use App\Class\Repositories\Products\ProductImageRepository;
use App\Class\Repositories\Products\ProductImageRepositoryInterface;
use App\Class\Repositories\Products\ProductRepository;
use App\Class\Repositories\Products\ProductRepositoryInterface;
use App\Class\Services\BaseService;
use App\Models\ProductImage;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductImageService extends BaseService
{

    protected $productImagesRepository;

    public function __construct(

        ProductImageRepository $productImagesRepository,
    ){

        $this->productImagesRepository = $productImagesRepository;

    }

    public function product_detail($id)
    {
        return $this->productImagesRepository->product_detail($id);
    }
}
