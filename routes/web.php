<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('client')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLoginClient'])->name('web.login.client.show');
    Route::post('/login', [AuthController::class, 'loginClient'])->name('web.login.client');
    Route::get('/signup', [AuthController::class, 'showFormSignupClient'])->name('web.signup.client.show');
    Route::post('/signup', [AuthController::class, 'signupClient'])->name('web.signup.client');
});

Route::prefix('store')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLoginStore'])->name('web.login.store.show');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('web.login.store.login');
    Route::get('/register', [AuthController::class, 'showFormSignupStore'])->name('web.signup.store.show');
    Route::post('/register', [AuthController::class, 'signupStore'])->name('web.signup.store.signup');
});


Route::middleware('check.client')->prefix('client')->group(function () {

    Route::prefix('homes')->group(function () {
        Route::get('list', [HomeController::class, 'list'])->name('web.client.home.list');
        Route::get('view', [HomeController::class, 'view'])->name('web.client.home.view');
        Route::get('create', [HomeController::class, 'create'])->name('web.store.home.create');
        Route::post('create', [HomeController::class, 'store'])->name('web.store.home.store');
    });

    Route::prefix('product')->group(function () {
        Route::get('product_detail/{id}', [ProductController::class, 'product_detail'])->name('web.client.product.product_detail');
    });

    Route::prefix('cart')->group(function () {
        Route::get('list', [CartController::class, 'list'])->name('web.client.cart.list');
        // Route::get('create', [CartController::class, 'create'])->name('web.store.cart.create');
        Route::post('create', [CartController::class, 'AddCart'])->name('web.client.cart.AddCart');
    });
    Route::prefix('order')->group(function () {
        // Route::get('list', [CartController::class, 'list'])->name('web.client.cart.list')
        // Route::get('create', [CartController::class, 'create'])->name('web.store.cart.create');
        Route::post('create', [OrderDetailController::class, 'store'])->name('web.client.cart.store');
    });
});


Route::middleware('check.store')->prefix('store')->group(function () {

    Route::prefix('product')->group(function () {
        Route::get('list', [ProductController::class, 'list'])->name('web.store.product.list');
        Route::get('create', [ProductController::class, 'create'])->name('web.store.product.create');
        Route::post('create', [ProductController::class, 'saveCreate'])->name('web.store.product.saveCreate');
    });

    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'list'])->name('web.store.category.list');
        Route::get('create', [CategoryController::class, 'create'])->name('web.store.category.create');
        Route::post('create', [CategoryController::class, 'saveCreate'])->name('web.store.category.saveCreate');
        Route::get('update/{id}', [CategoryController::class, 'update'])->name('web.store.category.update');
        Route::post('update/', [CategoryController::class, 'saveUpdate'])->name('web.store.category.saveUpdate');
        Route::any('delete-subcate/{id}', [CategoryController::class, 'deleteSubCategory'])->name('web.store.category.delete-subcate');
    });

    Route::prefix('menus')->group(function () {
        Route::get('list', [MenusController::class, 'index'])->name('web.store.menus.list');
        Route::get('create', [MenusController::class, 'create'])->name('web.store.menus.create');
        Route::post('create', [MenusController::class, 'store'])->name('web.store.menus.store');
        Route::get('update/{id}', [MenusController::class, 'edit'])->name('web.store.menus.edit');
        Route::post('update/{id}', [MenusController::class, 'update'])->name('web.store.menus.update');
        Route::any('delete-subcate/{id}', [MenusController::class, 'destroy'])->name('web.store.menus.destroy');
    });

    Route::prefix('order')->group(function () {
        Route::get('list', [OrderController::class, 'index'])->name('web.store.order.list');
        Route::get('detail/{id}', [OrderDetailController::class, 'detail'])->name('web.store.order.detail');
    });


    Route::prefix('statistics')->group(function () {
        Route::get('list', [StatisticsController::class, 'index'])->name('web.store.statistics.list');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
