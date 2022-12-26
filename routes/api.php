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
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;

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

// them san pham
Route::post('factory/add_product', [FactoryController::class, 'add_product']);
// xem tat ca san pham co trong nha may
Route::get('factory/view_products/{factory_code}', [FactoryController::class, 'view_product']);
// xuat san pham 
Route::post('factory/deliver_product_to_store', [FactoryController::class, 'xuat_san_pham']);
// xem san pham loi hoac bi tra ve
Route::get('factory/view_failed_products/{factory_code}', [FactoryController::class, 'view_failed_products']);
// nhan san pham loi tu ttbh
Route::post('factory/nhan_san_pham_loi', [FactoryController::class, 'nhan_san_pham_loi']);


// route chức năng của store
Route::get('store/view_products/{code}', [StoreController::class,'view_products']);
// nhap san pham ve dai ly
Route::post('store/add_product', [StoreController::class,'nhap_san_pham']);
// ban san pham
Route::post('store/sold_product', [StoreController::class, 'ban_san_pham']);
// dua ve trung tam bao hanh
Route::post('store/dua_ve_ttbh', [StoreController::class,'dua_ve_ttbh']);
// nhan san pham bao hanh xong tu ttbh
Route::post('store/nhan_lai_tu_ttbh', [StoreController::class, 'nhan_tu_ttbh']);
// tra cho khach hang
Route::post('store/tra_lai_kh', [StoreController::class, 'tra_lai_kh']);


// route chức năng ttbh
// nhan san pham can bao hanh tu dai ly
Route::post('warranty/nhan_san_pham', [WarrantyController::class, 'nhan_san_pham']);
// tra san pham da bao hanh cho dai ly
Route::post('warranty/tra_cho_dai_ly', [WarrantyController::class, 'tra_cho_dai_ly']);
// tra san pham loi ve nha may
Route::post('warranty/tra_cho_nha_may', [WarrantyController::class, 'tra_cho_nha_may']);
// xem tat ca cac san pham o ttbh
Route::get('warranty/view_products/{code}', [WarrantyController::class,'view_products']);



// Login

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    
   
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::delete('logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'user']);
    });
});