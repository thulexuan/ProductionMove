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
Route::get('admin/viewAllProducts', [ProductController::class, 'view_all_products']);
Route::get('admin/viewProduct/{code}', [ProductController::class, 'view_product_detail']);

Route::get('admin/viewProductLines', [ProductController::class, 'view_product_lines']);
Route::post('admin/createAccount', [AdminController::class, 'create_account']);