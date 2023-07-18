<?php

namespace App\Class\Repositories\Products;

use App\Class\Repositories\BaseRepositoryInterface;

interface ProductImageRepositoryInterface extends BaseRepositoryInterface
{
    // Add thumbnails
    public function createMany(array $attribute);
    public function product_detail($id);

}
