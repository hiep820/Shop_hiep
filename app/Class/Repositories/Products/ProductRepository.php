<?php

namespace App\Class\Repositories\Products;

use App\Class\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function model()
    {
        return Product::class;
    }

    public function product_detail($id)
    {
        return Product::where('id',$id)->first();
    }

}
