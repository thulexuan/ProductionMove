<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_productlines() {
        // todo
    }

    public function view_all_products() {
        Product::select('product_code', 'product_line')->get();
        $products = Product::all();
        return response()->json($products);
    }
}
