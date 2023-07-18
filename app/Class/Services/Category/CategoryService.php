<?php

namespace App\Class\Services\Category;

use App\Class\Repositories\Categories\CategoryRepository;
use App\Class\Repositories\Categories\CategoryRepositoryInterface;
use App\Class\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryService extends BaseService
{
    protected $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function getSubCategoriesProduct()
    {
        return $this->categoryRepository->getSubCategoriesProduct();
    }

    public function create($request)
    {
        $data = $request->only([
            'name',
            'description',
        ]);


        DB::beginTransaction();
        try {
            $cateParent = $this->categoryRepository->create($data);

            if ($request->input('name_sub')[0] != null && count($request->input('name_sub')) > 1) {
                foreach ($request->input('name_sub') as $nameSubCate) {
                    $data = [
                        "name" => $nameSubCate,
                        "parent_id" => $cateParent->id
                    ];

                    $this->categoryRepository->create($data);
                }
            }
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    // Get list category and sub-category
    public function getListParentCategoryWithSub()
    {
        return $this->categoryRepository->getListParentCategoryWithSub();
    }

    // Get the original category
    public function getCategory($id)
    {
        return $this->categoryRepository->getCategoryDetail($id);
    }

    // Handel update category
    public function update($id, $data = [])
    {
        return $this->categoryRepository->update($id, $data);
    }

    // Get Products in category
    public function getProductsByCategory($id)
    {
        return $this->categoryRepository->getProductsByCategory($id);
    }

    // Delete Category
    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }
}
