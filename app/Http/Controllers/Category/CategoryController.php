<?php

namespace App\Http\Controllers\Category;

use App\Class\Services\Category\CategoryService;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService,
    ) {
        $this->categoryService = $categoryService;
    }

    // Show list category
    public function list()
    {
        $parentCategories = $this->categoryService->getSubCategoriesProduct();

        return view('store.category.list', [
            'parentCategories' => $parentCategories
        ]);
    }

    // Show form add category
    public function create()
    {
        return view('store.category.create');
    }

    // Handel add category
    public function saveCreate(Request $request)
    {
        $this->categoryService->create($request);

        return redirect()->route('web.store.category.list');
    }

    // Show form update category
    public function update($id)
    {
        $parentCategory = $this->categoryService->getCategory($id);

        return view('store.category.update', [
            'parentCategory' => $parentCategory,
        ]);
    }

    public function saveUpdate(Request $request)
    {
        $data = $request->only([
            'name',
            'description'
        ]);

        $this->categoryService->update($request->id, $data);

        if ($request->sub_cate_add) {
            foreach (json_decode($request->sub_cate_add, true) as $nameSubCateNew) {
                if ($nameSubCateNew) {
                    $this->categoryService->create([
                        "name" => $nameSubCateNew,
                        "parent_id" => $request->id
                    ]);
                }
            }
        }

        foreach (json_decode($request->sub_cate, true) as $subCate) {
            $this->categoryService->update($subCate["id"], [
                "name" => $subCate["name"]
            ]);
        }
        return response()->json($data);
    }

    // Handel delete subcategory
    public function deleteSubCategory($id)
    {
        $subCategories = $this->categoryService->getProductsByCategory($id);

        if (count($subCategories) == 0) {
            $this->categoryService->delete($id);

            return redirect()->back()->with('success', "Thanh cong");
        }

        return redirect()->back()->with('fail', "That bai");
    }
}
