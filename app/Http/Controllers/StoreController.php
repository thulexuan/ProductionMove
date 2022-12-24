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
    public function nhap_san_pham($product_code) {
        $product = Product::where('product_code','=',$product_code);
        $product->status = "đã đưa về đại lý";
        
        // $product->save();
        return response()->json([
            'Message' => "Nhập sản phẩm thành công",
        ]);
    }

    public function ban_san_pham(Request $request, $product_code) {
        $product = Product::where('product_code','=', $product_code)->first();

        $customer = new Customer();
        $customer->customer_code = $request->customer_code;
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        // customer->save();

        $order = new Order();
        $order->orderNumber = $request->orderNumber;
        $order->customer_code = $request->customer_code;
        $order->orderDate = now();
        // order->save();

        $orderDetail = new OrderDetail();
        $orderDetail->product_code = $product_code;
        $orderDetail->order_number = $request->orderNumber;
        // orderDetail->save();

        return response()->json([
            'Message' => 'Bán sản phẩm thành công',
            'customer' => $customer,
            'order' => $order,
            'orderDetail' => $orderDetail,
        ]);

    }

    public function dua_ve_ttbh($product_code, $warranty_center_code) {
        $product = Product::where('product_code','=',$product_code);
        $product->status = "đưa về trung tâm bảo hành";
        $product->warranty_center_code = $warranty_center_code;
        $product->save();
        return response()->json($product); 
    }

    
}
