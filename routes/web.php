<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth','prefix'=>'control-panel'],function (){


    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // role
    Route::get('/roles/create', [HomeController::class, 'createRole'])->name('admin.roles.create');
    Route::post('/roles/store', [HomeController::class, 'storeRole'])->name('admin.roles.store');
    Route::get('/roles/index', [HomeController::class, 'showRoles'])->name('admin.roles.index');
    Route::get('/roles/{id}/edit', [HomeController::class, 'editRole'])->name('admin.roles.edit');
    Route::post('/roles/{id}/update', [HomeController::class, 'updateRole'])->name('admin.roles.update');
    Route::get('/roles/{id}/delete', [HomeController::class, 'deleteRole'])->name('admin.roles.delete');

    //users with live wire
    Route::get('/users/profile', [UserController::class, 'profile'])->name('admin.users.profile');
    Route::post('/users/profile', [UserController::class, 'updateProfile'])->name('admin.users.profile');
    Route::get('/users/index', [UserController::class, 'showUsers'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'createUsers'])->name('admin.users.create');
    Route::post('/users/index', [UserController::class, 'store'])->name('admin.users.store');

    // theme
    Route::get('/users/theme/{theme}', [UserController::class, 'changeTheme'])->name('admin.users.theme');

    // settings
    Route::get('/settings/index', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::get('/settings/{id}/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/settings/{id}/update', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::post('/settings/index', [SettingController::class, 'store'])->name('admin.settings.store');


    // market
    Route::get('/markets/index', [MarketController::class, 'index'])->name('admin.markets.index');
    Route::get('/markets/create', [MarketController::class, 'create'])->name('admin.markets.create');
    Route::post('/markets/index', [MarketController::class, 'store'])->name('admin.markets.store');
    Route::get('/markets/{id}/edit', [MarketController::class, 'edit'])->name('admin.markets.edit');
    Route::post('/markets/{id}/update', [MarketController::class, 'update'])->name('admin.markets.update');

    //category
    Route::get('/categories/index/{id}', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/{id}/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/index', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');

    // product
    Route::get('/products/index/{id}', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/{id}/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/index', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');


});

