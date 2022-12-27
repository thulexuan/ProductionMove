<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductLine;
use App\Models\ProductSoldFactory;

class FactoryController extends Controller
{

    // Nhập sản phẩm, nhận request có product_code, product_name, product_line, brand, place_code
    public function add_product(Request $request) {
        $product = new Product();

        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_line = $request->product_line;
        $product->brand = $request->brand;
        $product->factory_code = $request->place_code;

        $product->status = "mới sản xuất";
        $product->manufacturing_date = now();

        $product->save();
        return response()->json($product);
    }

    public function view_product($factory_code) {
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

    public function xuat_san_pham(Request $request) {
        // request gom cac truong product_code, store_code, $factory_code
        $product_code = $request->product_code;
        $store_code = $request->store_code;
        $factory_code = $request->factory_code;

        $product = Product::where('product_code','=',$product_code)->first();
        $product->store_code = $store_code;

        $product->status = "đưa về đại lý";
        $product->factory_code = null;

        $product_sold_factory = new ProductSoldFactory();
        $product_sold_factory->factory_code = $factory_code;
        $product_sold_factory->product_code = $product_code;
        $product_sold_factory->store_code = $store_code;
        $product_sold_factory->sold_date = now();

        $product_sold_factory->save();

        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);

    }

    public function nhan_san_pham_loi(Request $request) {
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "lỗi đã trả về nhà máy";
        $product->warranty_center_code = null;
        $factory_code = $product->factory_code;

        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    // xem các sản phẩm bị lỗi và trả về 
    public function view_failed_products($factory_code) {
        $products = Product::where('factory_code','=',$factory_code)->get();
        $data = array();
        foreach ($products as $product) {
            if ($product->status == "lỗi đã trả về nhà máy" || $product->status == "trả lại nhà máy") {
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

    public function statistic_sold_product($factory_code, $year) {
        $products_sold_factory = ProductSoldFactory::where('factory_code','=',$factory_code)
        ->whereYear('sold_date','=',$year)->get();

        $result = array();
        for ($month = 1; $month <= 12; $month++) {
            foreach ($products_sold_factory as $product_sold_factory) {
            
                $num_of_products = ProductSoldFactory::whereMonth('sold_date','=', $month)->get()->count();
                array_push($result, [
                    'month' => $month,
                    'num_of_products' => $num_of_products,
                ]);
            } 
        }
        $num_all = $products_sold_factory->count();
        array_push($result, [
            'All sold products' => $num_all,
        ]);
        
        return response()->json($result);
    }
}