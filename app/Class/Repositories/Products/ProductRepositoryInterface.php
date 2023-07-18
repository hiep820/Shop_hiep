<?php

namespace App\Class\Repositories\Products;

use App\Class\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function product_detail($id);

}
