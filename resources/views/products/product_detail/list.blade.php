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
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<?php
    $tenmaychu='localhost:3306';
    $tentaikhoan='root';
    $pass='';
    $csdl='product';
    //$link = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");
    $conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Not correct');
    mysqli_select_db($conn,$csdl);
    mysqli_set_charset($conn,'utf8');
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>


<section>
    <div class="container">
        <div class="row">
                @include('components.sliderbar')

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{$ProductDetail->feature_image_path}}" alt="" />
                        </div>
                    </div>
                    <!--/product-information-->
                    <div class="col-sm-7">
                        <div class="product-information">
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{$ProductDetail->name}}</h2>
                            <img src="{{asset('Eshopper/images/product-details/rating.png')}}" alt="" />
                            <span>
                                <span>{{number_format($ProductDetail->Unit_price)}} VNĐ</span>
                                <div id="add" class="some-class" data-target="{{$ProductDetail->id}}" onclick="add_to_cart();">
                                    <button type="button" class="btn btn-fefault cart add_to_cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    <!-- <a class="add-to-cart pull-left" href="{{route('giohang.add',['id' => $ProductDetail->id])}}"><i class="fa fa-shopping-cart"></i>Add to cart</a> -->
                                </div>
                            </span>
                            <p>{{$ProductDetail->content}}</p>
                            <a href=""><img src="{{asset('Eshopper/images/product-details/share.png')}}" class="share img-responsive" alt="" /></a>
                            <img height="240px" src="https://en.wikipedia.org/wiki/Fruit" />
                        </div>
                    </div>

                </div>

                <!--/product-information-->
                <!-- cmt area -->
                <?php
                if(auth()->user()){

                ?>
                    <form action="<?php echo e($commentRoute);?>" method="post">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        <div class="input-group input-group-sm mb-3" style="width: -webkit-fill-available;">
                            <input name="cmts" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Your comment here!">
                            <input name="product_id" style="display: none;" value="<?php echo $id;?>">
                            <input name="email_users" style="display: none;" value="<?php echo auth()->user()->email;?>">
                        </div>
                        <button style=" position: absolute; right:  0; background-color: darkorange; margin-top: 3px" type="submit" class="btn btn-dark btn-sm" name="comment">Feed Back</button>
                    </form>
                <?php
                    } else {
                ?>
                    <a href="/admin" style="margin-left: 50px;" class="btn btn-danger">Please login to feedback</a>
                <?php
                    }
                ?>
                <!-- cmt area -->

                <div id="cmts_area" class="container" style="padding: unset;margin-top: 35px;width: auto;">
                    <?php
                        $q = "SELECT * FROM users_comment WHERE product_id = $id ";
                        $q__ = mysqli_query($conn,$q);
                        // $list_cmt =  mysqli_fetch_array($q__);
                        //get parm
                        // $comment = $list_cmt['comment'];
                        // $email_user = $list_cmt['email_users'];
                        // $create_at = $list_cmt['create_at'];

                        if (mysqli_num_rows($q__) != 0) {
                            // output data of each row
                            while($row = $q__->fetch_assoc()) {
                                $_email = $row['email_users'];
                                // $q_name = "SELECT 'name' FROM user WHERE email =  $_email ";
                                // $get_name = mysqli_query($conn,$q_name);
                        // var_dump($row);
                                // $_name_ = $get_name->fetch_row();
                    ?>
                    <li id= "" style="list-style: none; border: groove;">
                        <div id="cmt_id-" class="" >
                        <div class="ava_author">
                            <img alt="" src="https://toigingiuvedep.vn/wp-content/uploads/2021/05/hinh-anh-avatar-de-thuong.jpg" class="" height="48" width="48" >
                            <cite id="cus_name-" style="font-weight: bold; font-size: 14px;"><?php echo $_email;?></cite>
                        </div>
                        <p><?php echo $row['comment'];?></p>
                    </li>

                    <?php
                           }
                        }
                    ?>
                </div>
                <!--/product-details-->
                <!--/product-details-->
                @include('fontend.components.recommend_product');
            </div>
        </div>
</section>
<script type="text/javascript">
    function add_to_cart() {
        var id = document.getElementById('add').getAttribute('data-target');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: " http://localhost:8000/giohang/add-to-cart",
            type:"get",
            data:{
                id:id,
                qty:'1',
            },
            dataType: 'json',
            success: function (data) {
                if(data.errorCode === null){
                    alert('Thêm vào giỏ hàng thành công!');
                    // console.log(data);
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
































