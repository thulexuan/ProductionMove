@extends('layouts.app')
   
@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
   
                <div class="card-body">
                    You are a Admin User.
                </div>
            </div>
        </div>
    </div>
</div> -->
<ul>
    <aside>
        <li><a href="">Cấp tài khoản mới</a></li>
        <li><a href="">Xem sản phẩm</a></li>
    </aside>
    <main>
        hehe
    @yield('content')
    </main>
</ul>
@endsection