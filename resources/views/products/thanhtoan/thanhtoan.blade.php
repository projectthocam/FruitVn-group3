@extends('fontlayouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection

@section('content')


<!--form-->
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Thông tin địa chỉ của khách hàng</h2>
                    <form action="{{route('giohang.submit')}}" method="POST">
                        @csrf
                        <input type="text" name="name" required placeholder="Họ và tên" />
                        <input type="text" name="email" required placeholder="Nhập email" />
                        <input type="text" name="phone" required placeholder="Nhập số điện thoại" />
                        <input type="text" name="address" required placeholder="Nhập địa chỉ giao hàng" />
                        <input type="text" name="comments" required placeholder="Nhập ghi chú cần thiết" />
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </form>
                </div><!--/login form-->
            </div>


        </div>
    </div>
</section>
<!--/form-->

@endsection






