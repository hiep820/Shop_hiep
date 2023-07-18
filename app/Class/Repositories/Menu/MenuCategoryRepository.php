<?php

namespace App\Class\Repositories\Menu;

use App\Class\Repositories\BaseRepository;
use App\Models\MenuCategory;

class MenuCategoryRepository  implements MenuCategoryRepositoryInterface
{
    public $model;

    public function __construct()
    {
        $this->model = $this->makeModel();
    }

    // abstract public function model();

    /**
     * @return \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeModel()
    {
        return app()->make($this->model());
    }

    public function model()
    {
        return MenuCategory::class;
    }

    public function all()
    {
        return MenuCategory::orderby('id_menu', 'ASC')->paginate(2);
    }

    public function create($attribute)
    {

        return $this->model->create($attribute);
    }

    public function update($attribute)
    {
        return $this->model->where($this->model->getKeyName(), $attribute)->update($attribute);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
