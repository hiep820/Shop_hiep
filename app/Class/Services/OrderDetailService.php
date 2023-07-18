<?php

namespace App\Class\Services;

use App\Class\Repositories\AuthClientRepository;
use App\Class\Repositories\CartRepository;
use App\Class\Repositories\Order\OrderDetailRepository;
use App\Class\Repositories\Order\OrderRepository;
use App\Class\Services\BaseService;

use App\Models\MenuCategory;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderDetailService extends BaseService
{

    protected $orderDetailRepository;
    protected $orderRepository;
    protected $cartRepository;
    protected $authClientRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        CartRepository $cartRepository,
        AuthClientRepository $authClientRepository,
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->cartRepository = $cartRepository;
        $this->authClientRepository = $authClientRepository;
    }

    /**
     * Store order and orderDetail.
     *
     * @param  $request
     * @return true
     */
    public function store($request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        //    dd($date);
        $usersId = Auth::user()->id;
        // dd($usersId);
        $orderData = [
            'users_id' =>  $usersId,
            'state' => '1',
            'create_at' => $date,
        ];

        DB::beginTransaction();
        try {
            $order = $this->orderRepository->create($orderData);

            $carts = $this->cartRepository->all();
            foreach ($carts as $cartt) {
                // dd($order->id);
                $orderDetailData = [
                    'product_id' => $cartt->product_id,
                    'order_id' => $order->id,
                    'quantity' => $cartt->quantity,
                    'price' => $cartt->price,
                ];
                $this->orderDetailRepository->create($orderDetailData);
                $this->cartRepository->deleteAll();
            }
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    /**
     * Show statistics by date.
     *
     * @param  $attribute
     * @return App\Class\Repositories\Order\OrderDetailRepository
     */
    public function statistical($attribute)
    {
        return $this->orderDetailRepository->statistical($attribute);
    }

    /**
     * Show all statistics.
     *
     * @param  $attribute
     * @return App\Class\Repositories\Order\OrderDetailRepository
     */
    public function statisticalAll($attribute)
    {
        return $this->orderDetailRepository->statisticalAll($attribute);
    }

    /**
     * Show orderDetail.
     *
     * @param  int $id
     * @return App\Class\Repositories\Order\OrderDetailRepository
     */
    public function detail($id)
    {
        return $this->orderDetailRepository->detail($id);
    }
}
