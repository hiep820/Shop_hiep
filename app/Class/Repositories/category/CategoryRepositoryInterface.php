<?php
namespace App\Class\Repositories\category;
interface CategoryRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
}
