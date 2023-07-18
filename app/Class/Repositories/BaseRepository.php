<?php

namespace App\Class\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected const PAGE_LIMIT = 10;

    /**
     * @var \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     */
    public $model;

    public function __construct()
    {
        $this->model = $this->makeModel();
    }

    abstract public function model();

    /**
     * @return \App\Models\BaseModel | \Illuminate\Database\Eloquent\Builder
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function makeModel()
    {
        return app()->make($this->model());
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate(array $options = [], $limit = self::PAGE_LIMIT)
    {
        $filter = collect($options);

        $query = $this->model;

        if ($filter->has('with')) {
            $query = $query->with($filter->get('with'));
        }

        if ($filter->has('sort')) {
            $sort = $filter->get('sort');
            if (!is_array($sort)) {
                $field    = $sort;
                $sortType = 'ASC';

                if (substr($sort, 0, 1) === '-') {
                    $field    = substr($sort, 1, strlen($sort) - 1);
                    $sortType = 'DESC';
                }

                $query = $query->orderBy($field, $sortType);
            }
        }

        return $query->paginate($limit);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    public function update($id, $attribute)
    {
        return $this->model->where($this->model->getKeyName(), $id)->update($attribute);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
