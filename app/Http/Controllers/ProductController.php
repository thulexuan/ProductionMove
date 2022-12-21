<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Factory;
use App\Models\ProductLine;

class ProductController extends Controller
{
    // Xem các dòng sản phẩm 
    public function view_product_lines() {
        $product_lines = ProductLine::all();
        foreach ($product_lines as $product_line) {
            $data[] = [
                'productline_code' => $product_line->productline_code,
                'productline_name' => $product_line->productline_name,
                'brand' => $product_line->make,
            ];
        }
        return response()->json($data);
    }

    // Xem tất cả sản phẩm, chỉ hiện những trường như trả về
    public function view_all_products() {
        $products = Product::all();
        foreach ($products as $product) {
            $data[] = [
                'product_code' => $product->product_code,
                'product_line' => $product->product_line,
                'product_name' => $product->product_name,
                'brand' => $product->brand,
                'status' => $product->status,
            ];
        }
        return response()->json($data);
    }

    // Xem chi tiết từng sản phẩm, hiện thêm những thuộc tính trong productline
    public function view_product_detail($code) {
        $product = Product::where('product_code','=',$code)->first();
        $product_line = ProductLine::where('productline_name','=', $product->product_line)->first();
        return response()->json([
            'product_code' => $code,
            'product_line' => $product->product_line,
            'engine_type' => $product_line->engine_type,
            'transmission' => $product_line->transmission,
            'drive_type' => $product_line->drive_type,
            'cylinder' => $product_line->cylinder,
            'total_seats' => $product_line->total_seats,
            'total_door' => $product_line->total_doors,
            'warranty_years' => $product_line->basic_warranty_years,
        ]);

    }

    
}
