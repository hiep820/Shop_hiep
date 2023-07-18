<?php

namespace App\Class\Repositories\Order;

interface OrderDetailRepositoryInterface
{
    public function create($attribute);
    public function update($id, $attribute);
    public function delete($id);
    public function statistical($attribute);
    public function statisticalAll($attribute);
    public function detail($id);


}
