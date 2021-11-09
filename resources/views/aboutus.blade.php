
@extends('fontlayouts.master')

@section('title')
    <title>About Us</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('home/home.css')}}">
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
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
    </section>

    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">About <strong>Us</strong></h2>
                    <div class="title text-center">
                        1. You are looking for a prestigious address fruits, clean and safe? <br>
                        2. You run out the midday sun or the rain to pick apples, bananas, rambutan, durian,... the most delicious for the family or office the same food?<br>
                        3. If you do not know how to choose what is right to avoid selecting fruits dirty, impregnated with chemicals?<br>
                        4. You always worry about the problem origin fruit?<br>
                        5. You know nothing of FRUIT VIETNAM?<br>
                        6. You do not know where to sell FRESH FRUITS in VIETNAM with reasonable price and quality?<br>
                        7. Are you truly interested in the health of your family and yourself yet?<br>
                        => LET THE FRUITS VN SOLVE ALL THESE PROBLEMS FOR YOU.<br>
                        <h4 style="color: #c65d09">This is the certificate of food safety of our company</h4><br>
                        <img src="/storage/img/CERTIFICATE.png" width="200px" height="200px"><br>
                        Why choose Fruits VN?<br>
                        1. Origin clear: declaration and phytosanitary full.<br>
                        2. Quality commensurate price: is the unit of a prestigious specialized in providing fruit from Vietnam with high quality and reasonable price.<br>
                        3. Buying advice 24/7: With a team of knowledgeable staff about fruit, always ready to advise conscientious and enthusiastic for you.<br>
                        4. Delivery place and quickly: with a team of Shipper, professional, not afraid of rain and sun, only a phone call 0788881924 you will have right, son, fruits are hand-delivered in 1 hour - 3 hours.<br>
                        <h4 style="color: #c65d09">WE ARE COMMITTED TO 100% RETURN THE FRUIT DOES HAVE SIGNS OF DAMAGE OR DISCOLORATION</h4><br>
                        <img src="/storage/img/100%.png" width="120px" height="120px">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->

@endsection
