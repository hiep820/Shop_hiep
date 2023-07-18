<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'state',
        'create_at',
    ];
    public function order_detail()
    {
        return $this->belongsToMany('App\models\OrderDetail', 'order_detail', 'order_id', 'product_id');
    }
    public function getStateNameAttribute()
    {
        if ($this->state == 1) {
            return "Đã đặt";
        } else {
            return "Bị hủy";
        }
    }
}

