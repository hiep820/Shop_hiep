<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        'name',
        'description',
        'avatar',
        'quantity',
        'status',
        'cate_id',
        'price',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}

