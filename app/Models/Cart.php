<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = '_cart';
    public $timestamps = false;
    public $primaryKey = 'id';
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'product_id',
    ];
}
