<?php

namespace App\Class\Repositories\Order;

use App\Class\Repositories\BaseRepository;
use App\Models\Order;
use Carbon\Carbon;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function model()
    {
        return Order::class;
    }

    public function all()
    {
        return Order::join("users", "order.users_id", "=", "users.id")->select(
            'order.id',
            'order.state',
            'order.create_at',
            'users.name'
        )->orderby('id', 'DESC')->get();
    }

    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function detail($id)
    {
        return Order::where('id', $id)->first();
    }
}
