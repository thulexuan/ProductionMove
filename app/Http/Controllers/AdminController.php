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

class AdminController extends Controller
{
    // Cấp tài khoản, request gửi lên gồm place_code, username, password, user_role, place_name, address
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

    
    
}
