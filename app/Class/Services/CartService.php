<?php

namespace App\Class\Services;

use App\Class\Repositories\CartRepository;
use App\Class\Repositories\Menu\MenuRepository;
use App\Class\Repositories\Products\ProductRepository;
use App\Class\Services\BaseService;
use App\Models\Category;
use App\Models\MenuCategory;
use App\Models\Product;

class CartService extends BaseService
{

    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Create a shopping cart.
     *
     * @param  $attribute
     * @return App\Class\Repositories\CartRepository
     */
    public function create($attribute)
    {
        $data = [
            'product_id' => $attribute->id,
            'name' => $attribute->name,
            'quantity' => $attribute->quantity,
            'price' => $attribute->price
        ];
        return $this->cartRepository->create($data);
    }

    /**
     * Show all cart list.
     *
     * @return App\Class\Repositories\CartRepository;
     */
    public function all()
    {
        return  $this->cartRepository->all();
    }

    public function sumCart()
    {
        $cart = $this->cartRepository->all();
        $total =0;
        foreach ($cart as $item) {
            $total += $item->price;
        }
        // dd ($total);
        return $total;
    }
}
