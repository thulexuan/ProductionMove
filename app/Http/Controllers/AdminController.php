<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Factory;
use App\Models\Store;
use App\Models\Warranty_Center;
use App\Models\User;
use App\Models\ProductLine;

class AdminController extends Controller
{
    // Cấp tài khoản, request gửi lên gồm place_code, username, password, 
    // user_role, place_name, address
    public function create_account(Request $request) {
        $new_user = new User();
        $new_user->place_code = $request->place_code;
        $new_user->username = $request->username;
        $new_user->password = bcrypt($request->password);
        $new_user->user_role = $request->user_role;

        if ($request->user_role == "store") {
            $new_store = new Store();
            $new_store->store_code = $request->place_code;
            $new_store->store_name = $request->place_name;
            $new_store->address = $request->address;

            $new_store->save();
        }

        if ($request->user_role == "factory") {
            $new_factory = new Factory();
            $new_factory->factory_code = $request->place_code;
            $new_factory->factory_name = $request->place_name;
            $new_factory->address = $request->address;

            $new_factory->save();
        }

        if ($request->user_role == "warranty_center") {
            $new_warranty_center = new Warranty_Center();
            $new_warranty_center->warranty_center_code = $request->place_code;
            $new_warranty_center->warranty_center_name = $request->place_name;
            $new_warranty_center->address = $request->address;

            $new_warranty_center->save();
        }

        $new_user->save();
        return response()->json([
            'Message' => 'Create user successfully',
        ]);
    }

    public function delete_account(Request $request) {
        // request gom place_code
        $user = User::where('place_code','=',$request->place_code)->first();
        
        $user_role = $user->user_role;
        if ($user_role == 'factory') {
            $factory = Factory::where('factory_code','=',$user->place_code)->first();
            $factory->delete();
        }
        if ($user_role == 'store') {
            $store = Store::where('store_code','=',$user->place_code)->first();
            $store->delete();
        }
        if ($user_role == 'warranty_center') {
            $warranty_center = Warranty_Center::where('warranty_center_code','=',$user->place_code)->first();
            $warranty_center->delete();
        }
        $user->delete();
        return response()->json([
            'message' => 'delete success',
            'deleted user' => $user,
        ]);
    }

    public function update_account(Request $request) {
        // request gom username, password, place_name, place_code, address
        $user = User::where('place_code','=',$request->place_code)->first();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user_role = $user->user_role;
        if ($user_role == 'factory') {
            $factory = Factory::where('factory_code','=',$user->place_code)->first();
            $factory->factory_name = $request->place_name;
            $factory->address = $request->address;
            $factory->save();
        }
        if ($user_role == 'store') {
            $store = Store::where('store_code','=',$user->place_code)->first();
            $store->store_name = $request->place_name;
            $store->address = $request->address;
            $store->save();
        }
        if ($user_role == 'warranty_center') {
            $warranty_center = Warranty_Center::where('warranty_center_code','=',$user->place_code)->first();
            $warranty_center->warranty_center_name = $request->place_name;
            $warranty_center->address = $request->address;
            $warranty_center->save();
        }
        

        $user->save();
        return response()->json([
            'message' => 'user updated',
            'updated user' => $user
        ]);
    }
    

    // Xem danh sách các nhà máy
    public function view_factories() {
        // sử dụng bảng factories
        $factories = Factory::all();
        $data = array();
        foreach ($factories as $factory) {
            array_push($data, [
                'factory_code' => $factory->factory_code,
                'factory_name' => $factory->factory_name,
                'address' => $factory->address
                
            ]);
        }
        return ($data);
    }

    // Xem danh sách các đại lý 
    public function view_stores() {
        $stores = Store::all();
        $data = array();
        foreach ($stores as $store) {
            array_push($data, [
                'store_code' => $store->store_code,
                'store_name' => $store->store_name,
                'address' => $store->address
            ]);
        }
        return ($data);
    }

    // Xem danh sách các trung tâm bảo hành
    public function view_warranty_centers() {
        $warranty_centers = Warranty_Center::all();
        $data = array();
        foreach ($warranty_centers as $warranty_center) {
            array_push($data, [
                'warranty_center_code' => $warranty_center->warranty_center_code,
                'warranty_center_name' => $warranty_center->warranty_center_name,
                'address' => $warranty_center->address
            ]);
        }
        return ($data);
    }

    // thêm dòng sản phẩm mới
    public function add_product_line(Request $request) {
        $product_line = new ProductLine();
        $product_line->productline_code = $request->productline_code;
        $product_line->productline_name = $request->productline_name;
        $product_line->make = $request->make;
        $product_line->year = $request->year;
        $product_line->engine_type = $request->engine_type;
        $product_line->transmission = $request->transmission;
        $product_line->drive_type = $request->drive_type;
        $product_line->cylinder = $request->cylinder;
        $product_line->total_seats = $request->total_seats;
        $product_line->total_doors = $request->total_doors;
        $product_line->basic_warranty_years = $request->basic_warranty_years;

        $product_line->save();
        return response()->json($product_line);
    }
    
}
