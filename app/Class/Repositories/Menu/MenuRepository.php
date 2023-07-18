<?php

namespace App\Class\Repositories\Menu;

use App\Class\Repositories\BaseRepository;
use App\Models\Menus;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{

    public function model()
    {
        return Menus::class;
    }

    public function all()
    {
        return Menus::orderby('id_menu', 'ASC')->paginate(100);
    }

    public function create($attribute)
    {

        return $this->model->create($attribute);
    }

    public function update( $attribute,$id){
        // dd($id);
        $data=[
            'name_menu' => $attribute->name_menu,
            'description' => $attribute->description,
            'starttime' => $attribute->starttime,
            'endtime' => $attribute->endtime
            ];
        return $this->model->where($this->model->getKeyName(),$id )->update($data);
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
