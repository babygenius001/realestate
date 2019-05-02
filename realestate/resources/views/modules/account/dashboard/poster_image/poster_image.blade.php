@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')

@endsection

@section('y_dashboard_content')
	@include('blocks/dashboard/dashboard_tools')
	<div class="DBGroup">
		@foreach($DB_table as $DB_table_items)
			@if($DB_table_items == "")
				<h1 style="width: 100%; text-align: center; border-top: 1px solid #000">Empty</h1>
			@endif			
			<div class="DBGroup_item">
				<a href="{{route('NRGDashPostersImages_unpublish',['id'=>$DB_table_items->id])}}" title="{{$DB_table_items->name}}">
					<img src="{{asset($DB_table_items->image)}}" alt="{{$DB_table_items->name}}">
					<span class="DBGroup_description">Click to Delete</span>
				</a>
			</div>

		@endforeach
	</div>
	<p style="padding: 15px 0;"><a class="bg-red back" href="{{route('NRGDashPosters')}}">Back</a></p>
@endsection