<?php

namespace App\Class\Repositories;

interface CartRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
    public function delete($id);
    public function edit($id);
    public function deleteAll();
}
