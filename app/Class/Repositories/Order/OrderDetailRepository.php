<?php

namespace App\Class\Repositories\Order;

use App\Class\Repositories\BaseRepository;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{

    public function model()
    {
        return OrderDetail::class;
    }

    public function all()
    {
    }

    public function statistical($attribute)
    {
        $startTime = $attribute->get('startTime');
        $endTime = $attribute->get('endTime');
        $order_detail = OrderDetail::join("order", "order.id", "=", "order_detail.order_id")->join("products", "products.id", "=", "order_detail.product_id")
            ->groupBy("product_id", "order_detail.price", "order_detail.quantity", "products.name")
            ->selectRaw("product_id,order_detail.price,order_detail.quantity,products.name, count(*) as count")
            ->whereBetween("order.create_at", array($startTime, $endTime))
            ->where("order.state", 1)->get();
        return $order_detail;
    }

    public function statisticalAll($attribute)
    {
        $order_detail = OrderDetail::join("order", "order.id", "=", "order_detail.order_id")->join("products", "products.id", "=", "order_detail.product_id")
            ->groupBy("product_id", "order_detail.price", "products.name")
            ->selectRaw("product_id,order_detail.price,products.name, count(*) as count")
            ->where("order.state", 1)
            // ->where('users_id',Auth::user()->id)
            ->get();
            // dd($order_detail);
        return $order_detail;
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
        return OrderDetail::join("products", "products.id", "=", "order_detail.product_id")
        ->select('products.name', 'order_detail.quantity', 'order_detail.price', 'products.avatar')->where('order_id', $id)->get();
    }
}
