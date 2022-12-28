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

Route::get('admin/view_products_by_status', [ProductController::class,'view_products_by_status']);
Route::get('admin/view_products_by_factory', [ProductController::class, 'view_products_by_factory']);
Route::get('admin/view_products_by_store', [ProductController::class,'view_products_by_store']);
Route::get('admin/view_products_by_warranty', [ProductController::class, 'view_products_by_warranty']);
Route::post('admin/add_product_line', [AdminController::class, 'add_product_line']);
Route::post('admin/delete_account',[AdminController::class,'delete_account']);
Route::post('admin/update_account', [AdminController::class, 'update_account']);
// route chức năng của factory

// them san pham
Route::post('factory/add_product', [FactoryController::class, 'add_product']);
// xem tat ca san pham co trong nha may
Route::get('factory/view_products/{factory_code}', [FactoryController::class, 'view_products']);
// xuat san pham 
Route::post('factory/deliver_product_to_store', [FactoryController::class, 'xuat_san_pham']);
// xem san pham loi hoac bi tra ve
Route::get('factory/view_failed_products/{factory_code}', [FactoryController::class, 'view_failed_products']);
// nhan san pham loi tu ttbh
Route::post('factory/nhan_san_pham_loi', [FactoryController::class, 'nhan_san_pham_loi']);
// thong ke san pham da ban theo thang
Route::get('factory/statistic/{factory_code}/{year}', [FactoryController::class, 'statistic_sold_product']);
// thong ke loi theo tung dong san pham
Route::get('factory/statistic_failed_by_product_lines/{factory_code}', [FactoryController::class, 'thong_ke_loi_theo_dong_san_pham']);

// route chức năng của store
Route::get('store/view_products/{store_code}', [StoreController::class,'view_products']);
// nhap san pham ve dai ly
Route::post('store/add_product', [StoreController::class,'nhap_san_pham']);
// ban san pham
Route::post('store/sold_product', [StoreController::class, 'ban_san_pham']);
// nhan san pham loi tu khach hang
Route::post('store/nhan_tu_kh',[StoreController::class,'nhan_tu_kh']);
// dua ve trung tam bao hanh
Route::post('store/dua_ve_ttbh', [StoreController::class,'dua_ve_ttbh']);
// nhan san pham bao hanh xong tu ttbh
Route::post('store/nhan_lai_tu_ttbh', [StoreController::class, 'nhan_tu_ttbh']);
// tra cho khach hang
Route::post('store/tra_lai_kh', [StoreController::class, 'tra_lai_kh']);
// Xem thong ke san pham da ban
Route::get('store/statistic_sold_products/{store_code}/{year}', [StoreController::class, 'statistic_sold_product']);


// route chức năng ttbh
// nhan san pham can bao hanh tu dai ly
Route::post('warranty/nhan_san_pham', [WarrantyController::class, 'nhan_san_pham']);
// tra san pham da bao hanh cho dai ly
Route::post('warranty/tra_cho_dai_ly', [WarrantyController::class, 'tra_cho_dai_ly']);
// tra san pham loi ve nha may
Route::post('warranty/tra_cho_nha_may', [WarrantyController::class, 'tra_cho_nha_may']);
// xem tat ca cac san pham o ttbh
Route::get('warranty/view_products/{code}', [WarrantyController::class,'view_products']);
// thong ke san pham da bao hanh duoc
Route::get('warranty/statistic_done/{warranty_center_code}', [WarrantyController::class, 'statistic_done_products']);
// thong ke san pham loi can tra ve nha may
Route::get('warranty/statistic_failed/{warranty_center_code}', [WarrantyController::class, 'statistic_failed_products']);





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

