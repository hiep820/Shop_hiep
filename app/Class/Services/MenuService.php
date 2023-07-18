<?php

namespace App\Class\Services;

use App\Class\Repositories\Menu\MenuRepository;
use App\Class\Services\BaseService;
use App\Models\Category;
use App\Models\MenuCategory;

class MenuService extends BaseService
{

    protected $menuCategoryRepository;
    protected $menuRepository;

    public function __construct(
        MenuRepository $menuRepository,
    ) {
        $this->menuRepository = $menuRepository;
    }

    public function edit($id)
    {
        $menu_category = MenuCategory::where('menu_id', $id)->get();
        $ary = [];
        foreach ($menu_category as $cate) {
            $ary[] = $cate->category_id;
        }
        return $ary;
    }

    public function editRp($id)
    {

        return $this->menuRepository->edit($id);
    }

    public function all()
    {
        return $this->menuRepository->all();
    }
}
