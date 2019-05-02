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
  
    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/define.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libraries/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


    <link rel="stylesheet" type="text/css" href="{{asset('css/svg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">

    @yield('y_css_area')

<!-- end css -->
    <!-- js -->

    <script src="{{asset('libraries/jquery-3.3.1.min.js')}}"></script>
    
    
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

        
        @yield('y_content')
   
</body>
</html>