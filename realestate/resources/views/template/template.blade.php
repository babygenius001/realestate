<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate</title>
<!-- css -->
<!--     <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('libraries/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/define.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libraries/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/svg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/streng.css')}}">
   
    @yield('y_css_area')
<!-- end css -->
    <!-- js -->
    <script type="text/javascript"  src="{{asset('libraries/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/tools.js')}}"></script>

    @yield('y_js_area')

    <!-- end js -->
</head>
<body>
    <div class='alert__group'>
        @if (session('alert'))
            <div class="alert alert__danger">
                {{session('alert') }}
                <span class="alert__close"></span>
            </div>
        @endif
        @if (session('notification'))
            <div class="alert alert__success">
                {{session('notification') }}
                <span class="alert__close"></span>
            </div>
        @endif

        @if(count($errors)>0)
            @foreach($errors->all() as $err)
                <div class="alert alert__danger">
                    {{$err}}
                    <span class="alert__close"></span>
                </div>
            @endforeach
        @endif
    </div>
    <div class="container">
        <div class="header">
            @include('blocks/header/header')
        </div>
        
        @include('blocks/body/streng')

        <div class="content">
            @yield('y_content')
        </div>
        <div class="footer container">
            <div class="footer--wrap container__wrapper">
                @include('blocks/footer/footer')
            </div>
        </div>
        
       
    </div>
    <script type="text/javascript" src="{{asset('libraries/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('libraries/OwlCarousel2-2.3.4/dist/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/top_header.js')}}"></script>
    {{-- <script type="text/javascript" src="https://unpkg.com/lazysizes@4.1.8/lazysizes.js"></script> --}}
    <script type="text/javascript" src="{{asset('libraries/lazysizes.js')}}"></script>

    @yield('y_js_area_end')
</body>
</html>