@extends('template/account')

@section('y_css_area')

@endsection

@section('y_js_area')

@endsection

@section('y_content')
    
    <div class="wrap_login">
        <div class="flex_item rotate">
            <img src="{{asset('images/resource/img-01.png')}}" alt="">
        </div>
        <div class="flex_item">
            <form method="post">
                <h1>Welcome to Realestate! Please login to continue</h1>
                <div>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg svg__envelope"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z" class=""></path></svg>
                <input name="email" placeholder="Username" type="email" required="">
               </div>
               <div>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg svg__lock"><path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z" class=""></path></svg>
                    <input name="password" placeholder="Password" type="password" required="">
               </div>
               <div class="button_gradient">
                   <span></span><span></span><span></span><span></span><button>Login</button>
               </div>
               <div class="button_gradient">
                   <a href="{{route('NRGHome')}}">Home</a>
               </div>
                
                <div><a href="">Forgot Username / Password?</a></div>
                <div><a href="{{route('NRGRegister')}}">Create Your Account &rarr;</a></div>
                
                {{ csrf_field() }}
            </form>    
        </div>
    </div>  
@endsection