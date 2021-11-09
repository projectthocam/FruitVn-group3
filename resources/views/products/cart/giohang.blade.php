
@extends('fontlayouts.master')

@section('title')
    <title>Home page</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
    <link rel="stylesheet" href="{{asset('home/home.js')}}">
    <script>
        $("#thanhtoan").click(function(e){
            e.preventDefault();
            $("#form").show();
        })

    </script>
@endsection

@section('content')


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

    <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>

			</div>
            @if(Session::has('cart'))
                <div class="table-responsive cart_info urldelete" data-url="{{route('giohang.delete')}}">
                    <table class="table table-condensed update_cart_url" data-url="{{route('giohang.update')}}">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Image</td>
                                <td class="description">Product Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_cart as $product)
                            <tr id="tr{{$product['item']['id']}}">
                                <td class="cart_product">
                                <img style="width: 100px; height: 100px;"  src="{{$product['item']['feature_image_path']}}" alt="">
                                </td>
                                <td class="cart_description">
                                    <h4>{{$product['item']['name']}}</h4>
                                </td>
                                <td class="cart_price">
                                    <p><a id="price{{$product['item']['id']}}">{{$product['item']['Unit_price']}}</a></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button"   >
                                        <input class="cart_quantity_input" id="{{$product['item']['id']}}" type="number" min="1" max="10" value="{{$product['qty']}}">
                                    </div>
                                </td>
                                <td class="cart_total" >
                                    <p class="cart_total_price" id="tprice{{$product['item']['id']}}"> {{$product['tprice']}}</p>
                                </td>
                                <td>

                                    <a class="btn btn-success remove-from-cart"id="{{$product['item']['id']}}" onclick="deletex(this.id);" >Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-10">
                        <h2><a>Tổng thanh toán:</a> <a id="total">{{Session('cart')->totalPrice}} </a><a>VNĐ</a></h2>
                    </div>

                        {{-- <div  class="col-md-2 btn btn-success" >
                            <a href="{{route('giohang.thanhtoan')}}" style="color: white">Thanh toán</a>
                        </div> --}}
                        <div  class="col-md-2 btn btn-success" >
                            <a id="thanhtoan" href="#" style="color: white">Thanh toán</a>
                        </div>

                </div>
            @else
                <div class="empty">
                    <span>YOUR CART IS EMPTY!</span>
                </div>
            @endif
            <section id="form"  style="display:none">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <div class="login-form"><!--login form-->
                                <h2>Information of Customers</h2>
                                <form action="{{route('giohang.submit')}}" method="POST">
                                    @csrf
                                    <input type="text" name="name" required placeholder="Full Name" />
                                    <input type="text" name="email" required placeholder="Email" />
                                    <input type="text" name="phone" required placeholder="Number Phone" />
                                    <input type="text" name="address" required placeholder="Address" />
                                    {{-- <input type="text" name="comments" required placeholder="Nhập ghi chú cần thiết" />--}}
                                    {{-- <input type="text" name="size" placeholder="Nhập size giày cần mua"> --}}
                                    <button type="submit" class="btn btn-default">Check</button>
                                </form>
                            </div><!--/login form-->
                        </div>
                    </div>
                </div>
            </section>
		</div>
	</section>

    <script type="text/javascript">
    $(".cart_quantity_input").on("input", function() {
        var id = $(this).attr('id');
        var value=$(this).val();
        var price =   document.getElementById("price"+id).innerHTML;
        var t=value*price;
        var x=document.getElementById("tprice"+id);
        document.getElementById("tprice"+id).innerHTML=t.toString();

        //var price= document.getElementById("price"+id).value;
        //var price=document.getElementById("tprice"+id).innerHTML = "Paragraph changed!";
        // alert(id);
        // alert($(this).val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: " http://localhost:8000/giohang/update-cart",
            type:"get",
            data:{
                id:id,
                qty:value,
            },
            dataType: 'json',
            success: function (data) {
                if(data.errorCode === null){
                    document.getElementById("total").innerHTML=data['total'];
                    console.log(data['total']);
                }
            },
            error: function(data) {
                console.log('AJAX call failed.');
            },
        });
    });
    function deletex(clicked_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: " http://localhost:8000/giohang/delete-cart",
            type:"get",
            data:{
                id:clicked_id,
            },
            dataType: 'json',
            success: function (data) {
                if(data.errorCode === null){
                    var myobj = document.getElementById("tr"+clicked_id);
                    myobj.remove();
                    document.getElementById("total").innerHTML=data['total'];
                    console.log(data['total']);
                }
            },
            error: function(data) {
                console.log('AJAX call failed.');
                alert(data.errorCode);
            },
        });
    }
</script>
@endsection











