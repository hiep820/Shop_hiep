<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menus extends BaseModel
{
    use HasFactory;
    protected $table = 'menus';
    public $timestamps = false;
    public $primaryKey = 'id_menu';
    protected $fillable = [
        'name_menu',
        'description',
        'starttime',
        'endtime',
    ];
    public function menucategory()
    {
        return $this->belongsToMany('App\models\MenuCategory', 'menus_categories', 'menu_id', 'category_id');
    }
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(MenuCategory::class);
    }
}
