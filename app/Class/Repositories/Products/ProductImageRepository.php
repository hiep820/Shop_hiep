<?php

namespace App\Class\Repositories\Products;

use App\Class\Repositories\BaseRepository;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductImageRepository extends BaseRepository implements ProductImageRepositoryInterface
{
    public function model()
    {
        return ProductImage::class;
    }

    public function createMany(array $attribute)
    {
        return $this->model->insert($attribute);
    }

    public function product_detail($id)
    {
        // $primage=ProductImage::join("products","products.id","=","product_images.product_id")->select('path')->where('product_id',$id)->ary();
        // $ary = [];
        // foreach ($primage as $item) {
        //     $ary[] = $item->path;
        // }

        // // dd($ary);
        return ProductImage::join("products","products.id","=","product_images.product_id")->select('path')->where('product_id',$id)->get();
    }
}
