<?php
namespace App\Class\Repositories\category;
use App\Class\Repositories\BaseRepository;
use App\Models\Category;
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }

    public function all()
    {
        return Category::all();
    }

    public function create($attribute)
    {
        $data=[
            'name' => $attribute->name_category,
            'description' => $attribute->description,
            'parent_id' => $attribute->parent_id,
            'slug' => $attribute->slug
            ];
        return $this->model->create($data);
    }

    public function update($id, $attribute){
        $data=[
            'name' => $id->name_category,
            'description' => $id->description,
            'parent_id' => $id->parent_id,
            'slug' => $id->slug
            ];
        return $this->model->where($this->model->getKeyName(),$attribute )->update($data);
    }
}
