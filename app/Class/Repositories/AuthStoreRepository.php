<?php

namespace App\Class\Repositories;

use App\Class\Repositories\BaseRepository;
use App\Models\Store;

class AuthStoreRepository extends BaseRepository implements AuthStoreRepositoryInterface
{
    public function model()
    {
        return Store::class;
    }
}
