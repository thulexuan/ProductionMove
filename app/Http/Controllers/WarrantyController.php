<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WarrantyController extends Controller
{
    public function nhan_san_pham(Request $request) {
        // request gom product_code, store_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đang bảo hành";
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    public function tra_cho_dai_ly(Request $request) {
        // request gom product_code, $store_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đã bảo hành xong, trả đại lý";
        $product->store_code = $request->store_code;
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    public function tra_cho_nha_may(Request $request) {
        // request gom product_code, $factory_code, $warranty_center_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->factory_code = $request->factory_code;
        $product->warranty_center_code = $request->warranty_center_code;
        $product->status = "lỗi cần trả về nhà máy";
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    public function view_products($warranty_code) {
        // xem tất cả sản phẩm có trong nhà máy
        $products = Product::where('warranty_center_code','=', $warranty_code)->get();
        $data = array();
        foreach ($products as $product) {
            if ($product->status=='đang bảo hành' || $product->status=='lỗi cần trả về nhà máy') {
                array_push($data,[
                    'product_code' => $product->product_code,
                    'product_line' => $product->product_line,
                    'product_name' => $product->product_name,
                    'brand' => $product->brand,
                    'status' => $product->status,
                ]);
            }
            
        }
        return response()->json($data);
    }

    // xem cac san pham da bao hanh va thong ke so luong
    public function statistic_done_products($warranty_center_code) {
        $products = Product::where('warranty_center_code','=',$warranty_center_code)->get();
        $result = array();
        foreach ($products as $product) {
            if ($product->status=='đã bảo hành xong, trả đại lý' || $product->status=='đã bảo hành xong'
            || $product->status=='đã trả lại bảo hành') {
                array_push($result, [
                    'product_code' => $product->product_code,
                    'product_line' => $product->product_line,
                    'brand' => $product->brand,
                ]);
            }
            
        }
        return response()->json([
            'num_products' => count($result),
            'products' => $result,
        ]);
    }

    // xem cac san pham loi va thong ke so luong
    public function statistic_failed_products($warranty_center_code) {
        $products = Product::where('warranty_center_code','=',$warranty_center_code)->get();
        $result = array();
        foreach ($products as $product) {
            if ($product->status=='lỗi cần trả về nhà máy') {
                array_push($result, [
                    'product_code' => $product->product_code,
                    'product_line' => $product->product_line,
                    'brand' => $product->brand,
                ]);
            }
            
        }
        $other_products = Product::where('status','=','lỗi đã đưa về nhà máy')->get();
        foreach ($other_products as $other_product) {
            array_push($result, [
                'product_code' => $other_product->product_code,
                'product_line' => $other_product->product_line,
                'brand' => $other_product->brand,
            ]);
        }
        return response()->json([
            'num_products' => count($result),
            'products' => $result,
        ]);
    }

    
}
