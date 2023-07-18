<?php

namespace App\Class\Repositories\Categories;

use App\Class\Repositories\BaseRepositoryInterface;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    // Get Category
    public function getSubCategoriesProduct();

    // Get list category and sub-category
    public function getListParentCategoryWithSub();
    
    // Get the original category
    public function getCategoryDetail($id);

    // Get Products in category
    public function getProductsByCategory($id);
}
