<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

class StoreController extends Controller
{
    //
    public function view_products($store_code) {
        // xem tất cả sản phẩm có trong nhà máy
        $products = Product::where('store_code','=', $store_code)->get();
        $data = array();
        foreach ($products as $product) {
            if ($product->status=='đang ở đại lý' || $product->status=='đã bảo hành xong' 
            || $product->status=='lỗi đã đưa về đại lý' || $product->status=='lỗi cần bảo hành') {
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

    // nhap san pham tu factory
    public function nhap_san_pham(Request $request) {
        // request co truong product_code, factory_code, store_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đang ở đại lý";
        $product->factory_code = null;
        $product->store_code = $request->store_code;
        
        $product->save();
        return response()->json([
            'Message' => "Nhập sản phẩm thành công",
            'product' => $product,
        ]);
    }

    public function ban_san_pham(Request $request) {
        // request gom cac truong: product_code, customer_code, customer_name, address, phone_number,
        // order_number, $store_code
        $product = Product::where('product_code','=', $request->product_code)->first();
        $product->store_code = null;
        $product->status = "đã bán";
        $product->save();

        $customer = new Customer();
        $customer->customer_code = $request->customer_code;
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phone_number;

        $customer->save();

        $order = new Order();
        $order->order_number = $request->order_number;
        $order->customer_code = $request->customer_code;
        $order->store_code = $request->store_code;
        $order->product_code = $product->product_code;
        $order->orderDate = now();

        $order->save();

        

        return response()->json([
            'Message' => 'Bán sản phẩm thành công',
            'customer' => $customer,
            'order' => $order,
            
        ]);

    }

    public function nhan_tu_kh(Request $request) {
        // request gom product_code, customer_code, store_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "lỗi cần bảo hành";
        $product->store_code = $request->store_code;
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    public function dua_ve_ttbh(Request $request) {
        // request gom product_code, warranty_center_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đưa về trung tâm bảo hành";
        $product->store_code = null;
        $product->warranty_center_code = $request->warranty_center_code;
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]); 
    }

    public function nhan_tu_ttbh(Request $request) {
        // request gom product_code, store_code, warranty_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đã bảo hành xong";
        $product->store_code = $request->store_code;
        $product->save();
        return response()->json($product);

    }

    

    public function tra_lai_kh(Request $request) {
        // request gom product_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "đã trả lại bảo hành";
        $product->store_code = null;
        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    public function statistic_sold_product($store_code, $year) {
        $sold_products = Order::where('store_code','=',$store_code)
        ->whereYear('orderDate','=',$year)->get();
        $result = array();
        for ($month = 1; $month <= 12; $month++) {
            foreach ($sold_products as $sold_product) {
                $num_of_products = Order::whereMonth('orderDate','=',$month)->get()->count();
                array_push($result, [
                    'month' => $month,
                    'num_of_sold_products' => $num_of_products,
                ]);
            } 
        }
        $num_all = $sold_products->count();
        array_push($result, [
            'All sold products' => $num_all,
        ]);
        
        return response()->json($result);
    }

    
}
