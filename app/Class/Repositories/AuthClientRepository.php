<?php

namespace App\Class\Repositories;

use App\Class\Repositories\BaseRepository;
use App\Models\User;

class AuthClientRepository extends BaseRepository implements AuthClientRepositoryInterface
{
    public function model()
    {
        return User::class;
    }
}
