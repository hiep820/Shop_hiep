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

class ProductService extends BaseService
{
    protected $productRepository;
    protected $categoryRepository;
    protected $productImagesRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository,
        ProductImageRepository $productImagesRepository,
    ){
        $this->productRepository = $productRepository;
        $this->productImagesRepository = $productImagesRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // List Data Product
    public function list()
    {
        return $this->productRepository->all();
    }

    // Get Sub-Category
    public function getSubCategory()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }


    // Add products and images
    public function  saveCreate($request)
    {
        $product = [
            'name' => $request->name,
            'description' => $request->description,
            'avatar' => $request->avatar->hashName(),
            'quantity' => $request->quantity,
            'status' => $request->status,
            'price' => $request->price,
            'cate_id' => $request->cate_id,
        ];

        Storage::disk('public')->put('images/', $request->avatar);

        DB::beginTransaction();
        try {
            $productId = $this->productRepository->create($product);

            // Add thumbnail
            if ($request->images) {
                $productImage = [];

                foreach ($request->images as $images) {
                    Storage::disk('public')->put('images/', $images);
                    $productImage[] = [
                        'path' => $images->hashName(),
                        'product_id' => $productId->id
                    ];
                }

                $this->productImagesRepository->createMany($productImage);
            }
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    public function product_detail($id)
    {
        return $this->productRepository->product_detail($id);
    }
}
