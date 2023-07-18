<?php

namespace App\Http\Controllers;

use App\Class\Services\AuthService;
use App\Http\Requests\AuthClientRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    protected $authService;

    public function __construct(
        AuthService $authService,
    ) {
        $this->authService = $authService;
    }

    // Show form login client
    public function showFormLoginClient()
    {
        return view('auth.client.login');
    }

    // handle login client
    public function loginClient(Request $request)
    {
        $authClient = $request->only([
            'email',
            'password',
        ]);

        if (Auth::guard()->attempt($authClient)) {
            $request->session()->regenerate();
            return redirect()->route('web.client.home.list');
        }

        return back();
    }

    // Show form signup client
    public function showFormSignupClient()
    {
        return view('auth.client.signup');
    }

    // Handel signup Client
    public function signupClient(Request $request)
    {
        $this->authService->signupClient($request);

        return redirect()->route('web.login.client.show');
    }

    // Show form login store
    public function showFormLoginStore()
    {
        return view('auth.store.login');
    }

    // Handel login store
    public function loginStore(Request $request)
    {
        $authStore = $request->only([
            'email',
            'password',
        ]);

        if (Auth::guard('store')->attempt($authStore)) {
            $request->session()->regenerate();
            return redirect()->route('web.store.product.list');
        }

        return back();
    }

    // Show form signup store
    public function showFormSignupStore()
    {
        return view('auth.store.register');
    }

    // Handel signup store
    public function signupStore(Request $request)
    {
        $this->authService->signupStore($request);
        return redirect()->route('web.login.store.show');
    }
}
