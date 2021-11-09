@extends('fontlayouts.master')


@section('title')
    <title>Home page</title>
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection

@section('content')
@if(Session::has('message'))
	<div class="alert alert-success" style="float:left; width:50%; margin-top: 4px;margin-bottom: -47px;">{{Session::get('message')}}</div>
@endif
<!--slider-->
@include('components.slider')
<!--/slider-->


<section>
    <div class="container">
        <div class="row">
            @include('components.sliderbar')
            
            <div class="col-sm-9 padding-right">
                <!--features_items-->
               @include('fontend.components.feature_product')
                <!--features_items-->
                

                <!--category-tab-->
                @include('fontend.components.category_tab')
                <!--/category-tab-->
                

                <!--recommended_items-->
               {{-- @include('fontend.components.recommend_product') --}}
                
                <!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>


@endsection

