<?php

namespace App\Class\Services;

use App\Class\Repositories\Menu\MenuCategoryRepository;
use App\Class\Repositories\Menu\MenuRepository;
use App\Class\Services\BaseService;
use App\Models\MenuCategory;
use App\Models\Menus;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuCategoryService extends BaseService
{
    protected $menuCategoryRepository;
    protected $menuRepository;

    public function __construct(
        MenuRepository $menuRepository,
        MenuCategoryRepository $menuCategoryRepository
    ) {
        $this->menuRepository = $menuRepository;
        $this->menuCategoryRepository = $menuCategoryRepository;
    }

    /**
     * Store menu and menu_category.
     *
     * @param  $request
     * @return true
     */
    public function store($request)
    {
        $menuData = [
            'name_menu' => $request->input('name_menu'),
            'description' => $request->input('description'),
            'starttime' => $request->input('starttime'),
            'endtime' => $request->input('endtime'),
        ];
        $test = true;
        $starttime = $this->menuRepository->all();
        $iptime = Carbon::parse($request->input('starttime'));
        $iptimet = Carbon::parse($request->input('endtime'));

        DB::beginTransaction();
        try {

            foreach ($starttime as $time_a) {
                $time_start = Carbon::parse($time_a->starttime);
                $time_end = Carbon::parse($time_a->endtime);
                if (($time_start->gt($iptime) && $time_start->gt($iptimet)) or ($time_end->lt($iptime) && $time_end->lt($iptimet))) {
                    $test = false;
                    break;
                }
            }
            if ($test == false) {
                $menu = $this->menuRepository->create($menuData);
            }
            $category_idds = $request->input('category_id');
            $categoryIds = [];
            foreach ($category_idds as $category_idd) {
                $categoryIds[] = $category_idd;
            }
            $menu->menucategory()->sync($categoryIds);
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    /**
     * Update menu and menu_category.
     *
     * @param  $request
     * @param  int  $id
     * @return true
     */
    public function update($request, $id)
    {
        $this->menuRepository->update($request, $id);
        $menu = $this->menuRepository->find($id);
        $category_idds = $request->input('category_id');
        $categoryIds = [];
        foreach ($category_idds as $category_idd) {
            $categoryIds[] = $category_idd;
        }
        $menu->menucategory()->sync($categoryIds);
    }
}
