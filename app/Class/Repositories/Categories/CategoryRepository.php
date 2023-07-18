<?php

namespace App\Class\Repositories\Categories;

use App\Class\Repositories\BaseRepository;
use App\Class\Repositories\Categories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }

    // Get SubCategory
    public function getSubCategoriesProduct()
    {
        return $this->model->where('parent_id', 0)->get();
    }

    // Get list Category anh SubCategory
    public function getListParentCategoryWithSub()
    {
        return $this->model->with('subCategory')->where('parent_id', null)->get();
    }

    // Get the original category
    public function getCategoryDetail($id)
    {
        return $this->model->with('subCategory')->find($id);
    }

    // Get Products in category
    public function getProductsByCategory($id)
    {
        return $this->model->whereHas('products', function ($q) use ($id) {
            $q->where('cate_id', $id);
        })->get();
    }


}
