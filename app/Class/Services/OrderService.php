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

class OrderService extends BaseService
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
     * Show all order.
     *
     * @return App\Class\Repositories\Order\OrderRepository
     */
    public function all()
    {
        return $this->orderRepository->all();
    }

    /**
     * Show orderDetail.
     *
     * @param  int $id
     * @return App\Class\Repositories\Order\OrderRepository
     */
    public function detail($id)
    {
        return $this->orderRepository->detail($id);
    }
}
