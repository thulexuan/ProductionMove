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
use App\Http\Controllers\AdminController;
Route::prefix('admin')->group(function() {
    Route::get('adminHome', [AdminController::class, 'index']);
    Route::get('produce-acc', [AdminController::class, 'produce_acc']);
    Route::get('view-products', [AdminController::class, 'view_products']);
});
Route::get('/', function() {
    return view('formtest');
});

Route::get('get-form', [AdminController::class, 'getForm']);
Route::post('handle-form', [AdminController::class, 'handleRequest']);