@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')

@endsection

@section('y_dashboard_content')
	@include('blocks/dashboard/dashboard_tools')
	<div class="DBGroup">
		@foreach($Dash_table as $Dash_table_item)
			<div class="DBGroup_item">
				<a href="{{route('NRGDashProducts_getDetail',['id'=>$Dash_table_item->id])}}" title="{{$Dash_table_item->name}}">
					<img src="{{asset($Dash_table_item->image)}}" alt="{{$Dash_table_item->name}}">
					<span class="DBGroup_title">{{$Dash_table_item->name}}</span>
					<span class="DBGroup_description">{{$Dash_table_item->description_short}}</span>
				</a>
			</div>
		@endforeach
	</div>
	<div class='panel-pagination'>
		<ul class="pagination">
			{!!$Dash_table->render()!!}
		</ul>
	</div>
@endsection