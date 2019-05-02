@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')

@endsection

@section('y_dashboard_content')
	@include('blocks/dashboard/dashboard_tools')
	<div class="DBGroup_list">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Model</th>
					<th>Color</th>
					<th>Storage</th>
					<th>Price</th>
					<th>Tools</th>
				</tr>

			</thead>
			<tbody>

				<?php $i = 0; ?>
				@foreach($Dash_table as $Dash_table_item)
					<tr>
						<td class="box-center">{{++$i}}</td>
						<td>{{str_limit($Dash_table_item->name,50)}}</td>
						
						<td class="box-center" style="background-color: {{$Dash_table_item->m_products_colours->hex_colour}}">{{$Dash_table_item->m_products_colours->name}}</td>
						<td class="box-center">{{$Dash_table_item->storage}}</td>
						<td class="box-center">{{$Dash_table_item->price}}</td>
						<td class="box-center"><a href="{{route('NRGDashPostersDetail_getUpdate',['id'=>$Dash_table_item->id])}}">Update/Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	<p style="padding: 15px 0;"><a class="bg-red back" href="{{route('NRGDashPosters')}}">Back</a></p>
	<div class='panel-pagination'>
		<ul class="pagination">
			{!!$Dash_table->render()!!}
		</ul>
	</div>
@endsection