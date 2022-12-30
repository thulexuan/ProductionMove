<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductLine;
use App\Models\Factory;
use App\Models\ProductSoldFactory;


class FactoryController extends Controller
{

    // Nhập sản phẩm, nhận request có product_code, product_name, product_line, brand, place_code
    public function add_product(Request $request) {
        $product_check = Product::where('product_code','=',$request->product_code)->first();
        if ($product_check == null) {
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
        else {
            return response()->json([
                'message' => "product_code đã tồn tại",
            ]);
        }
    }

    public function view_products($factory_code) {
        // xem tất cả sản phẩm có trong nhà máy
        $products = Product::where('factory_code','=', $factory_code)->get();
        foreach ($products as $product) {
            if ($product->status =='mới sản xuất' || $product->status =='lỗi đã đưa về nhà máy') {
                $data[] = [
                    'product_code' => $product->product_code,
                    'product_line' => $product->product_line,
                    'product_name' => $product->product_name,
                    'brand' => $product->brand,
                    'status' => $product->status,
                ];
            }
            
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
        // request có product_code, factory_code
        $product = Product::where('product_code','=',$request->product_code)->first();
        $product->status = "lỗi đã đưa về nhà máy";
        $product->warranty_center_code = null;
        $product->store_code = null;
        $factory_code = $product->factory_code;

        $product->save();
        return response()->json([
            'message' => 'success',
            'product' => $product,
        ]);
    }

    // xem các sản phẩm bị lỗi
    public function view_failed_products($factory_code) {
        $products = Product::where('factory_code','=',$factory_code)->get();
        $data = array();
        foreach ($products as $product) {
            if ($product->status == "lỗi đã đưa về nhà máy") {
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

    // thống kê sản phẩm đã bán qua 12 tháng của từng năm và hiển thị tháng bán nhiều nhất
    public function statistic_sold_product($factory_code, $year) {
        $products_sold_factory = ProductSoldFactory::where('factory_code','=',$factory_code)
        ->whereYear('sold_date','=',$year)->get();

        $result = array();
        $num_all = $products_sold_factory->count();
        if ($num_all == 0) {
            for ($month = 1; $month <= 12; $month++) {    
                    array_push($result, [
                        'month' => $month,
                        'num_of_products' => 0,
                        'ratio' => 0,
                    ]);
            }
            
            array_push($result, [
                'all_sold_products' => 0,
            ]);
            
            
            $max_month = array();
            
            array_push($result, [
                'month_sold_max' => $max_month,
            ]);
            
            
            
            return response()->json($result);
        } else {
            for ($month = 1; $month <= 12; $month++) {
                //foreach ($products_sold_factory as $product_sold_factory) {
                
                    $num_of_products = ProductSoldFactory::whereMonth('sold_date','=', $month)->get()->count();
                    array_push($result, [
                        'month' => $month,
                        'num_of_products' => $num_of_products,
                        'ratio' => $num_of_products*100/$num_all,
                    ]);
                //} 
            }
            
            array_push($result, [
                'all_sold_products' => $num_all,
            ]);
            $max_ratio = 0;
            $max_month = array();
            for ($i=0;$i<count($result)-1;$i++) {
                if ($result[$i]['ratio'] > $max_ratio) {
                    $max_ratio = $result[$i]['ratio'];
                }
            }
            for ($i=0;$i<count($result)-1;$i++) {
                if ($result[$i]['ratio'] == $max_ratio) {
                    array_push($max_month,$result[$i]['month']);
                }
            }
            array_push($result, [
                'month_sold_max' => $max_month,
            ]);
            
            return response()->json($result);
        }
        
    }

    // thống kê sản phẩm lỗi theo dòng sản phẩm và tìm ra dòng sản phẩm lỗi nhiều nhất
    public function thong_ke_loi_theo_dong_san_pham($factory_code) { 
        $failed_products = Product::where('status','=','lỗi đã đưa về nhà máy')
        ->where('factory_code','=',$factory_code)->get();
        $result = array();
        if (count($failed_products) != 0) {
            $product_lines = ProductLine::all();
            foreach ($product_lines as $product_line) {
            $num_failed_products = Product::where('status','=','lỗi đã đưa về nhà máy')
            ->where('factory_code','=',$factory_code)->where('product_line','=',$product_line->productline_name)
            ->get()->count();
            array_push($result, [
                'product_line' => $product_line->productline_name,
                'num_failed_products' => $num_failed_products,
                'ratio' =>  $num_failed_products*100/count($failed_products),
            ]);
        }

        $max_ratio = 0;
        $max_product_lines = array();
        for ($i=0;$i<count($result);$i++) {
            if ($result[$i]['ratio'] > $max_ratio) {
                $max_ratio = $result[$i]['ratio'];
            }
        }
        for ($i=0;$i<count($result);$i++) {
            if ($result[$i]['ratio'] == $max_ratio) {
                array_push($max_product_lines,$result[$i]['product_line']);
            }
        }
        array_push($result,[
            'num_failed_products' => count($failed_products),
        ],
        [
            'productline_failed_max' => $max_product_lines,
        ]);

            return response()->json($result);
        } else {
            return response()->json([
                'message' => 'no failed products',
                'result' => $result,
            ]);
        }
        
    }

    // thống kê sản phẩm theo số sản phẩm nhập vào theo 12 tháng trong năm 
}