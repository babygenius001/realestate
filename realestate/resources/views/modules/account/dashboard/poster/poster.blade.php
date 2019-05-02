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
					<th>title</th>
					<th>Image</th>
					<th class="box-img">Product</th>
					<th class="box-img">Product image</th>
					<th>Number model</th>
					<th>Tools</th>
				</tr>

			</thead>
			<tbody>

				<?php $i = 0; ?>
				@foreach($Dash_table as $Dash_table_item)
					<tr>
						<td class="box-center">{{++$i}}</td>
						<td><a href="{{route('NRGDashPosters_getDetail',['id'=>$Dash_table_item->id])}}">{{str_limit($Dash_table_item->name,25)}}</a></td>

						<td class="box-img"><a href="{{route('NRGDashPostersImages',['id'=>$Dash_table_item->id])}}">All image</a></td>
						<td class="box-img"><a target="_blank" href="{{route('NRGDashProducts_getDetail',['id'=>$Dash_table_item->products_id])}}">{{$Dash_table_item->m_products->name}}</a></td>
						<td class="box-img"><img src="{{asset($Dash_table_item->m_products->image)}}" alt=""></td>
						<td class="box-center">
							<a href="{{route('NRGDashPostersDetail',['id'=>$Dash_table_item->id])}}">Model:
								@foreach($Dash_table_item->m_products_posters_details as $pp_details_item)
									@if($pp_details_item->published == 0)
										@continue
									@endif
									{!!$pp_details_item->name . "<br/>" !!}
								@endforeach
							</a>
						</td>
						<td class="box-center"><a href="{{route('NRGDashPosters_getUpdate',['id'=>$Dash_table_item->id])}}">Update/Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	<div class='panel-pagination'>
		<ul class="pagination">
			{!!$Dash_table->render()!!}
		</ul>
	</div>
@endsection