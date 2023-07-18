<?php

namespace App\Class\Repositories\Menu;

interface MenuRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
    public function delete($id);
    public function edit($id);
}
