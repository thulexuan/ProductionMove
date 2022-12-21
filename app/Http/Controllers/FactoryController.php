<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FactoryController extends Controller
{
    public function nhap_san_pham(Request $request) {
        $product = new Product();

        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_line = $request->product_line;
        $product->brand = $request->brand;
        $product->factory_code = $request->place_code;

        $product->status = "moi san xuat";
        $product->manufacturing_date = now();

        $product->save();
        return response()->json($product);
    }

    public function xem_san_pham($factory_code) {
        // xem tất cả sản phẩm có trong nhà máy
        $products = Product::where('factory_code','=', $factory_code)->get();
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

    public function xuat_san_pham(Request $request, $code) {
        // xuất sản phẩm có product_code = code cho đại lý 
        // request gồm các trường: product_name, product_line, place_code (xuất cho đại lý nào)
        // update lại product
        $product = Product::where('product_code','=',$code)->first();
        $product->store_code = $request->store_code;

        $product->status = "Đưa về đại lý";

        $product->save();
        return response()->json($product);

    }

    // xem các sản phẩm bị lỗi và trả về 
    public function view_failed_products($factory_code) {
        $products = Product::where('factory_code','=',$factory_code)->get();
        $data = array();
        foreach ($products as $product) {
            if ($product->status == "Lỗi, đưa về nhà máy" || $product->status == "Trả lại nhà máy") {
                array_push($data, [
                    'product_code' => $product->product_code,
                        'product_line' => $product->product_line,
                        'product_name' => $product->product_name,
                        'brand' => $product->brand,
                        'status' => $product->status,
                ]);
            }
        }
        if (count($data) == 0) {
            return response()->json([
                'Message' => 'Have no failed products',
            ]);
        } else {
            return response()->json($data);
        }
        
    }
}