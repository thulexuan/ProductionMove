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
Route::put('factory/deliver_product_to_store/{code}', [FactoryController::class, 'xuat_san_pham']);
Route::get('factory/view_failed_products/{factory_code}', [FactoryController::class, 'view_failed_products']);

