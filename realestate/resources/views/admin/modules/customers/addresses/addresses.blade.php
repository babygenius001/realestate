@extends('admin/templates/admin_template')

{{-- css --}}
	@section('admin_css')
			
			<link rel="stylesheet" type="text/css" href="{{asset('css/admin/home.css')}}"/>
	@endsection
{{-- end css --}}


{{-- js --}}
	@section('admin_js')



	@endsection
{{-- end js --}}


{{-- content --}}
	@section('admin_content')
		<div class="panel panel-default">
	        <div class="panel-heading">	            
	            @if(isset($title))
	                {{$title}}
	            @endif
	            
		                
			   	<div class="tool_data">
			   		<div class='tool_data__rowsTable'>
						<select id="rowsTable" class='btn-5'>
							<option disabled="disabled"  selected="selected">Show .. entries</option>
							<option value="3">3 entries</option>
							<option value="5">5 entries</option>
							<option value="7">7 entries</option>
							<option value="10">10 entries</option>
							<option value="20">20 entries</option>
							<option value="50">50 entries</option>
							<option value="100">100 entries</option>
							<option value="200">200 entries</option>
						</select>
			   		</div>
	   			</div>
	        </div>
    	
 <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-striped table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <th class="box-id">#</th>
	                            <th>Name</th>
	                            <th>Address</th>
	                            <th>Published</th>
	                            <th>ordering</th>
	                            <th>Update</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	<?php $i=0; ?>
	                    	@if($DB_table != null)
		                    	@foreach($DB_table as $items)   
			                        <tr>
			                            <td id='{{++$i}}'>{{$i}}</td>
			                            <td><a href="{{route('NRGCAddresses_getDetail',['id'=>$items->customers_id])}}">{{$items->m_customers->name}}</a></td>	
			                            <td>{{$items->address}}</td>		
			                            <td class="box-center">{{$items->published}}</td>
			                            <td class='box-center'>{{$items->ordering}}</td>		
			                            <td class="tool tool__update box-center"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/update/{{$items->id}}"><span class="svg svg__edit"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-user-edit fa-w-20 fa-3x"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96zm406.6 204.1l-34.7-34.7c-6.3-6.3-14.5-9.4-22.8-9.4-8.2 0-16.5 3.1-22.8 9.4L327.8 424l-7.6 68.2c-1.2 10.7 7.2 19.8 17.7 19.8.7 0 1.3 0 2-.1l68.2-7.6 222.5-222.5c12.5-12.7 12.5-33.1 0-45.7zM393.3 473.7l-39.4 4.5 4.4-39.5 156.9-156.9 35 35-156.9 156.9zm179.5-179.5l-35-35L573 224h.1l.2.1 34.7 35-35.2 35.1zM134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 20.7 0 39.9 6.3 56 16.9l22.8-22.8c-22.2-16.2-49.3-26-78.8-26-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h243.5c-2.8-7.4-4.1-15.4-3.2-23.4l1-8.6H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320z" class=""></path></svg></span>Update</a></td>	
			                           
			                        </tr>
		                        @endforeach
	                        @endif
	                    </tbody>
	                </table>

	            </div>
	        </div>
	        <div class='panel-pagination'>
	        	<ul class="pagination">
	        		{!!$DB_table->render()!!}
				</ul>
	        </div>
	    </div>
	@endsection
{{-- end content --}}