@extends('template/template')

@section('y_css_area')
	
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard/dashboard_navigation.css')}}">
    @yield('y_dashboard_css_area')

@endsection

@section('y_js_area')
    <script src="{{asset('js/libraries/UnmarkVietnamese.js')}}"></script>
	@yield('y_dashboard_js_area')
@endsection

@section('y_content')
	<div class="container__wrapper">
		@include('blocks/dashboard/navigation')
		<div id="y_dashboard_content">
			
			<h1>@if(isset($title)) {{$title}} @else {{"Title - No Value"}} @endif </h1>

    		@yield('y_dashboard_content')
		</div>
	</div>
@endsection

@section('y_js_area_end')
	@yield('y_dashboard_js_area_end')
@endsection