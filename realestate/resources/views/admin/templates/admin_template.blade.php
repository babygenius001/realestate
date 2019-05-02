<!doctype html>

{{-- 'admin/templates/ckecking_permission' --}}

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

    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/admstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/menu_navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/top_bar_navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/footer.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/svg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.css')}}">

    @yield('admin_css')

<!-- end css -->
    <!-- js -->
    <script type="text/javascript"  src="{{asset('libraries/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/admin/menu_navigation.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/admin/admin.js')}}"></script>
    <script type="text/javascript"  src="{{asset('js/libraries/UnmarkVietnamese.js')}}"></script>

    @yield('admin_js')


    <!-- end js -->
</head>
<body>
    <div class="container">
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
       
        <div class="top_bar_navigation">
            <div class="top_bar_navigation--wrap">
                @include('admin/blocks/top_bar_navigation')
            </div>
        </div><!-- end top_bar_navigation-->

        <div class="body_layout">
            <div class="body_layout--wrap">

                <div class="menu_navigation">
                    <div class="menu_navigation--wrap">
                        @include('admin/blocks/menu_navigation')
                    </div>
                </div><!-- end menu_navigation-->
                
                <div class="content">
                    <div class='content--wrap'>
                        <h1 class='content__title'>
                            @if(isset($title))
                                {{$title}}
                            @else 
                                {{'Home'}}
                            @endif

                        </h1>
                        <h4 class='content__descriptons'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quia, inventore id laudantium facilis soluta ad aut sint, asperiores culpa minima. Rem quos consequuntur atque dolores enim facilis libero laudantium harum est laboriosam quam, molestiae eum asperiores quis deserunt natus similique excepturi minus sapiente sit nostrum temporibus! Sequi excepturi iste ut ducimus possimus quaerat, reiciendis optio voluptate odio nulla animi commodi, saepe provident repellat quibusdam laboriosam labore fugit tenetur, eius. Iste rem architecto, tempora! Unde, molestias. Itaque quidem ratione debitis quis, reprehenderit laudantium dolorem similique beatae placeat enim, magni voluptate tenetur eaque quibusdam delectus voluptates aliquid accusamus, illum id vero.</h4>
                        
                        @yield('admin_content')

                    </div>
                </div><!-- end content-->

            </div><!-- end body_layout--wrap-->
        </div><!-- end body_layout-->
        
        <div class="footer">
            <div class="footer--wrap">
                @include('admin/blocks/footer')
            </div>
        </div>
        <!-- end footer-->
        
        <script type="text/javascript" src="{{asset('libraries/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('libraries/OwlCarousel2-2.3.4/dist/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/owl.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/top_header.js')}}"></script>
    </div>

</body>
</html>