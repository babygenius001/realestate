<?php 

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reale</title>
<!-- css -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/admlogin.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/svg.css')}}">
<!-- end css -->

<!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- end js -->
</head>
<body>
    <div class="container">
        <h1 class="brand_name">Easte State Login</h1>
        <div class="content">
			<div id="login_form">
				<form action="{{url('admin/login')}}" method='POST' role='form' class='f_login'>
					<div class="f_login--wrap">

						<h2>Please Sign in</h2>
						<div class="f_login__content">
							<div class="content--wrap">
								<p><input type="text" name='iText-email' class="i-email" placeholder="E-mail" value="{{old('iText-email')}}"></p>
                                    @if ($errors->has('iText-email'))
                                        <p style="color: red">{{$errors->first('iText-email')}}</p>
                                    @endif
								<p><input type="password" name='iPassword-password' class="i-password" placeholder="Password"></p>
                                    @if ($errors->has('iPassword-password'))
                                        <p style="color: red">{{$errors->first('iPassword-password')}}</p>
                                    @endif
                                {!! csrf_field() !!}
								<p><input type="submit" name="fSubmit_login"></p>
							</div>
						</div>
					</div>
				</form>	
			</div>

        </div>

        <script type="text/javascript" src="{{asset('libraries/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/top_header.js')}}"></script>
    </div>
   
</body>
</html>