<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends BaseModel
{
    use HasFactory;
    protected $table = 'product_images';

    protected $fillable = [
        'path',
        'product_id',
    ];
}
