<?php

namespace App\Class\Repositories;

interface HomeRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
    public function delete($id);
    public function edit($id);
}
