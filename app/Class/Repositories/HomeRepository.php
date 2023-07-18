<?php

namespace App\Class\Repositories;

use App\Class\Repositories\BaseRepository;
use App\Models\Menus;
use Carbon\Carbon;

class HomeRepository extends BaseRepository implements HomeRepositoryInterface
{

    public function model()
    {
        return Menus::class;
    }

    public function all()
    {
        $mytimes =  Carbon::now();
        $mytime = $mytimes->format('H:i');
        // dd($mytime);
        $stast = Menus::get('starttime');
        $menu =  Menus::join("menus_categories", "menus.id_menu", "=", "menus_categories.menu_id")
            ->join("categories", "categories.id", "=", "menus_categories.category_id")
            ->join("products", "categories.id", "=", "products.cate_id")
            ->where('menus.starttime', '<=', $mytime)
            ->where('menus.endtime', '>=', $mytime)
            ->get();
        return $menu;
    }

    public function getTime()
    {
        $mytimes =  Carbon::now();
        $mytime = $mytimes->format('H:i');
        $menu =  Menus::where('menus.starttime', '<=', $mytime)
            ->where('menus.endtime', '>=', $mytime)
            ->get();
        return $menu;
    }

    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function edit($id)
    {
        return Menus::where('id_menu', $id)->first();
    }
}
