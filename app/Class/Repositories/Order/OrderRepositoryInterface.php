<?php

namespace App\Class\Repositories\Order;

interface OrderRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
    public function delete($id);

}
