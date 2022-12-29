<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Factory;
use App\Models\Store;
use App\Models\Warranty_Center;
use App\Models\ProductLine;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer;

class ProductController extends Controller
{

    // Xem các dòng sản phẩm 
    public function view_product_lines() {
        $product_lines = ProductLine::all();
        return response()->json($product_lines);
    }

    // Xem tất cả sản phẩm, chỉ hiện những trường như trả về
    public function view_all_products() {
        $products = Product::all();
        foreach ($products as $product) {
            $status = $product->status;
            $product_code = $product->product_code;
            $place_at = null;
            $place_name = null;
            if ($status == "mới sản xuất" || $status == "lỗi đã đưa về nhà máy" || $status == "trả lại nhà máy") {
            $place_at = "Đang ở nhà máy";
            $place_name = Factory::where('factory_code','=', $product->factory_code)->first()->factory_name;
            }
            if ($status == "đưa về đại lý") {
                $place_at = "Đang vận chuyển";
                $place_name = null;
            }
            if ($status == "đang ở đại lý" || $status == "đã bảo hành xong" || $status == "lỗi đã đưa về đại lý" || $status == "lỗi cần bảo hành") {
            $place_name = Store::where('store_code','=', $product->store_code)->first()->store_name;
            $place_at = "Đang ở đại lý";
            }
            if ($status == "đang bảo hành" || $status == "lỗi cần trả về nhà máy") {
            $place_at = "Đang ở trung tâm bảo hành";
            $place_name = Warranty_Center::where('warranty_center_code','=', $product->warranty_center_code)->first()->warranty_center_name;
            }
            if ($status == "đã bán" || $status == "đã trả lại bảo hành") {
            $place_at = "Đang ở khách hàng";
            $customer_code = Order::where('product_code','=',$product_code)->first()->customer_code;
            $place_name = Customer::where('customer_code','=',$customer_code)->first();
            }
            $data[] = [
                'product_code' => $product->product_code,
                'product_line' => $product->product_line,
                'product_name' => $product->product_name,
                'brand' => $product->brand,
                'status' => $product->status,
                'place_at' => $place_at,
                'place_name' => $place_name
            ];
        }
        return response()->json($data);
    }

    // Xem chi tiết từng sản phẩm, hiện thêm những thuộc tính trong productline
    public function view_product_detail($code) {
        $product = Product::where('product_code','=',$code)->first();
        if ($product == null) {
            return response()->json([
                'Message' => 'No product has this code',
            ]);
        } else {
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
    
    // Thong ke san pham theo trang thai
    public function view_products_by_status() {
        // trạng thái này thì số lượng là bao nhiêu
        $status_array = array('mới sản xuất', 'đang ở đại lý', 'đã bán','đang bảo hành','đã bảo hành xong',
        'đã trả lại bảo hành', 'lỗi cần trả về nhà máy', 'lỗi đã đưa về nhà máy', 'lỗi đã đưa về đại lý');
        $num_of_status_array = array();
        foreach ($status_array as $status) {
            $num_of_products = Product::where('status','=',$status)->get()->count();
            array_push($num_of_status_array, [
                'status' => $status,
                'num_of_products' => $num_of_products,
            ]);
        }
        return response()->json($num_of_status_array);
    }

    // Thong ke san pham theo nha may, nha may nay thi co bao nhieu san pham dang o day
    public function view_products_by_factory() {
        $factories = Factory::all();
        $result = array();
        foreach ($factories as $factory) {
            $factory_code = $factory->factory_code;
            $num_of_products = Product::where('factory_code','=',$factory_code)->get()->count();
            array_push($result, [
                'factory_code' => $factory->factory_code,
                'factory_name' => $factory->factory_name,
                'num_of_products' => $num_of_products,
            ]);
        }
        return response()->json($result);
    }

    // Thong ke san pham theo dai ly, dai ly nay thi co bao nhieu san pham dang o day
    public function view_products_by_store() {
        $stores = Store::all();
        $result = array();
        foreach ($stores as $store) {
            $store_code = $store->store_code;
            $num_of_products = Product::where('store_code','=',$store_code)->get()->count();
            array_push($result, [
                'store_code' => $store->store_code,
                'store_name' => $store->store_name,
                'num_of_products' => $num_of_products,
            ]);
        }
        return response()->json($result);
    }

    // Thong ke san pham theo ttbh, ttbh nay thi co bao nhieu san pham dang o day
    public function view_products_by_warranty() {
        $warranty_centers = Warranty_Center::all();
        $result = array();
        foreach ($warranty_centers as $warranty_center) {
            $warranty_center_code = $warranty_center->warranty_center_code;
            $num_of_products = Product::where('warranty_center_code','=',$warranty_center_code)->get()->count();
            array_push($result, [
                'warranty_center_code' => $warranty_center->warranty_center_code,
                'warranty_center_name' => $warranty_center->warranty_center_name,
                'num_of_products' => $num_of_products,
            ]);
        }
        return response()->json($result);
    }


    // Xem các sản phẩm mà đang ở nhà máy/đại lý/trung tâm bảo hành
    public function view_products_by_place($place_code) {
        $user = User::where('place_code','=',$place_code)->first();
        $data = array();
        if ($user == null) {
            return response()->json([
                'Message' => 'No user has this place code',
            ]);
        } else {
            if ($user->user_role == "factory") {
                $products = Product::where('factory_code','=',$place_code)->get();
        
            foreach ($products as $product) {
                array_push($data, [
                'product_code' => $product->product_code,
                'product_line' => $product->product_line,
                'product_name' => $product->product_name,
                'brand' => $product->brand,
                'status' => $product->status,
                ]);
              } 
            } 
            if ($user->user_role == "store") {
                $products = Product::where('store_code','=',$place_code)->get();
        
            foreach ($products as $product) {
                array_push($data, [
                'product_code' => $product->product_code,
                'product_line' => $product->product_line,
                'product_name' => $product->product_name,
                'brand' => $product->brand,
                'status' => $product->status,
                ]);
              } 
            } 

            if ($user->user_role == "warranty_center") {
                $products = Product::where('warranty_center_code','=',$place_code)->get();
        
            foreach ($products as $product) {
                array_push($data, [
                'product_code' => $product->product_code,
                'product_line' => $product->product_line,
                'product_name' => $product->product_name,
                'brand' => $product->brand,
                'status' => $product->status,
                ]);
              } 
            } 
            
            
        }
        
        return response()->json($data);
    }

    public function update_product_status($product_code, $status) {
        $product = Product::where('product_code','=',$product_code)->first();
        $product->status = $status;
        $product->save();
        return response()->json($product);
    }

    public function place_of_product($product_code) {
        $product = Product::where('product_code','=',$product_code)->first();
        if ($product == null) {
            return response()->json([
                'Message' => 'No this product',
            ]);
        }
        $status = $product->status;
        if ($status == "mới sản xuất" || $status == "lỗi đã trả về nhà máy" || $status == "trả lại nhà máy") {
            $place_at = "Đang ở nhà máy";
            $place_name = Factory::where('factory_code','=', $product->factory_code)->first()->factory_name;
        }
        if ($status == "đang ở đại lý" || $status == "đã bảo hành xong" || $status == "lỗi đã đưa về đại lý" || $status == "lỗi cần bảo hành") {
            $place_name = Store::where('store_code','=', $product->store_code)->first()->store_name;
            $place_at = "Đang ở đại lý";
        }
        if ($status == "đang bảo hành" || $status == "lỗi cần trả về nhà máy") {
            $place_at = "Đang ở trung tâm bảo hành";
            $place_name = Store::where('warranty_center_code','=', $product->warranty_center_code)->first()->warranty_center_name;
        }
        if ($status == "đã bán" || $status == "đã trả lại bảo hành") {
            $place_at = "Đang ở khách hàng";
            $order_number = OrderDetail::where('product_code','=',$product_code)->first()->order_number;
            $customer_code = Order::where('order_number','=',$order_number)->first()->customer_code;
            $place_name = Customer::where('customer_code','=',$customer_code)->first();
        }
        return response()->json([
            'Đang ở' => $place_at,
            'Tên địa điểm' => $place_name,
        ]);
    }
    

}
