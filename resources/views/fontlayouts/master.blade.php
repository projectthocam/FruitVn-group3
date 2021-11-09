<html>
    <head>          
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta name="description" content="">
             <meta name="author" content="">

             @yield('title') 
             <title>Home | E-Shopper</title>
             <link href="{{asset('Eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
             <link href="{{asset('Eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
             <link href="{{asset('Eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
             <link href="{{asset('Eshopper/css/price-range.css')}}" rel="stylesheet">
             <link href="{{asset('Eshopper/css/animate.css')}}" rel="stylesheet">
             <link href="{{asset('Eshopper/css/main.css')}}" rel="stylesheet">

             {{-- <link rel="shortcut icon" href="/Eshopper/images/ico/favicon.ico">
             <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/Eshopper/images/ico/apple-touch-icon-144-precomposed.png">
             <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/Eshopper/images/ico/apple-touch-icon-114-precomposed.png">
             <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/Eshopper/images/ico/apple-touch-icon-72-precomposed.png">
             <link rel="apple-touch-icon-precomposed" href="/Eshopper/images/ico/apple-touch-icon-57-precomposed.png"> --}}
             @yield('css')
    </head>
    <body>
        @include('components.header')

            @yield('content')

        @include('components.footer')


        <script src="{{asset('Eshopper/js/jquery.js')}}"></script>
        <script src="{{asset('Eshopper/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('Eshopper/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('Eshopper/js/price-range.js')}}"></script>
        <script src="{{asset('Eshopper/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('Eshopper/js/main.js')}}"></script>

        @yield('js')
    </body>

    
        
</html>