<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function factoryHome()
    {
        return view('factoryHome');
    }

    public function agencyHome()
    {
        return view('agencyHome');
    }

    public function serviceCenterHome()
    {
        return view('service-centerHome');
    }
}
