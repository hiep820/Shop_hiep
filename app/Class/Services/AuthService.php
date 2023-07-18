<?php

namespace App\Class\Services;

use App\Class\Repositories\AuthClientRepository;
use App\Class\Repositories\AuthClientRepositoryInterface;
use App\Class\Repositories\AuthStoreRepository;
use App\Class\Repositories\AuthStoreRepositoryInterface;
use App\Class\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    protected $authClientRepository;

    protected $authStoreRepository;

    public function __construct(
        AuthClientRepository $authClientRepository,
        AuthStoreRepository $authStoreRepository,

    ) {
        $this->authClientRepository = $authClientRepository;
        $this->authStoreRepository = $authStoreRepository;
    }

    // Signup account user
    public function signupClient($request)
    {
        $auth = $request->all();

        $auth['password'] = Hash::make($request->password);

        // $auth['role_id'] = '2';

        $this->authClientRepository->create($auth);
    }

    // Signup account Store
    public function signupStore($request)
    {
        $auth = $request->all();

        $auth['password'] = Hash::make($request->password);

        // $auth['role_id'] = '3';

        $this->authStoreRepository->create($auth);
    }
}
