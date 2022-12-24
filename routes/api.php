<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\Auth\LoginController;

// route chức năng của admin
Route::get('admin/view_all_products', [ProductController::class, 'view_all_products']);
Route::get('admin/view_product/{code}', [ProductController::class, 'view_product_detail']);
Route::get('admin/view_product_lines', [ProductController::class, 'view_product_lines']);
Route::post('admin/create_account', [AdminController::class, 'create_account']);
Route::get('admin/view_factories', [AdminController::class, 'view_factories']);
Route::get('admin/view_stores', [AdminController::class, 'view_stores']);
Route::get('admin/view_warranty_centers', [AdminController::class, 'view_warranty_centers']);

Route::get('admin/view_products_by_status/{status}', [ProductController::class,'view_products_by_status']);
Route::get('admin/view_products_by_place/{place_code}', [ProductController::class, 'view_products_by_place']);

// route chức năng của factory
Route::post('factory/add_product', [FactoryController::class, 'add_product']);
Route::get('factory/view_products/{factory_code}', [FactoryController::class, 'view_product']);
Route::put('factory/deliver_product_to_store/{code}/{store_code}', [FactoryController::class, 'xuat_san_pham']);
Route::get('factory/view_failed_products/{factory_code}', [FactoryController::class, 'view_failed_products']);

// route chức năng của store
Route::put('store/add_product/{product_code}', [StoreController::class,'nhap_san_pham']);
Route::post('store/sold_product/{product_code}', [StoreController::class, 'ban_san_pham']);
Route::put('store/update_status_product/{code}/{status}', [StoreController::class, 'update_product_status']);



Route::get('product_detail/{product_code}', [ProductController::class, 'place_of_product']);

// Login

Route::post('login',[LoginController::class, 'login']);