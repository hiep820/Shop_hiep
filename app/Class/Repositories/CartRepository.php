<?php

namespace App\Class\Repositories;

use App\Class\Repositories\BaseRepository;
use App\Models\Cart;
use App\Models\Menus;
use Carbon\Carbon;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{

    public function model()
    {
        return Cart::class;
    }

    public function all()
    {
        return Cart::all();
    }

    public function create($attribute)
    {
        return $this->model->create($attribute);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function edit($id)
    {
        return Menus::where('id_menu', $id)->first();
    }

    public function deleteAll()
    {
        return $this->model->truncate();
    }

    public function sumCart()
    {
        $cart =Cart::all();
        $total =0;
        foreach ($cart as $item) {
            $total += $item->price;
        }
        // dd ($total);
        return $total;
    }
}
