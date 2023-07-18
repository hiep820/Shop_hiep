<?php

namespace App\Class\Repositories;

interface BaseRepositoryInterface
{
    public function find($id);

    public function create($attribute);

    public function update($id, $attribute);

    public function paginate();

    public function delete($id);

    public function all();
}
