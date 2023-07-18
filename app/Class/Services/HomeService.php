<?php

namespace App\Class\Services;

use App\Class\Repositories\HomeRepository;
use App\Class\Repositories\Order\OrderDetailRepository;
use App\Class\Repositories\Order\OrderRepository;
use App\Class\Services\BaseService;
use App\Models\MenuCategory;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeService extends BaseService
{

    protected $orderDetailRepository;
    protected $orderRepository;
    protected $homeRepository;

    public function __construct(
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository,
        HomeRepository $homeRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->homeRepository = $homeRepository;
    }

    /**
     * Store order and orderDetail.
     *
     * @param  $request
     * @return true
     */
    public function store($request)
    {
        $usersId = Auth::user()->id;
        $orderData = [
            'users_id' => $usersId,
            'state' => '1',
        ];
        DB::beginTransaction();
        try {
            $order = $this->orderRepository->create($orderData);

            $product_idds = $request->input('product_id');
            $productIds = [];
            foreach ($product_idds as $product_idd) {
                $orderDetailData = [
                    'quantity' => $request->input('quantity'),
                    'price' => $request->input('price'),
                ];
                $productIds[] = $product_idd;
            }
            $order->order_detail()->sync($productIds, $orderDetailData);
            DB::commit();

            return false;
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();

            return true;
        }
    }

    /**
     * Get time menu.
     *
     * @param  $request
     * @return true
     */
    public function getTime()
    {
        return $this->homeRepository->getTime();
    }

    /**
     * Get menu.
     *
     * @param  $request
     * @return true
     */
    public function all()
    {
        return $this->homeRepository->all();
    }
}
