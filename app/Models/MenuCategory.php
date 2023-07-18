<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuCategory extends BaseModel
{
    use HasFactory;

    protected $table = 'menus_categories';
    public $timestamps = false;
    public $primaryKey= 'id';
    protected $fillable = [
        'menu_id',
        'category_id',
    ];
    public function menu(): BelongsTo{
    	return $this->belongsTo('App\models\Menu', 'menu_id', 'id_menu');
    }
    public function category(){
    	return $this->belongsTo('App\models\Category', 'category_id', 'id');
    }
}
