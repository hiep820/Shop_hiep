<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Store extends BaseModel implements Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    use AuthenticableTrait;

    protected $table = "stores";

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'avatar',
        'role_id',
    ];

}
