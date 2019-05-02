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

                @include('admin/blocks/tool_data')
	        </div>
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-striped table-bordered table-hover">
	                    <thead>
	                        <tr>
	                            <th class="box-id">#</th>
	                            <th>Category Name</th>
	                            <th>Description short</th>
	                            <th>Published</th>
	                            <th>Update</th>
	                            <th>Delete</th>
	                        </tr>
	                    </thead>
	                    <div>
	                    <tbody>
	                    	<?php $i=0; ?>
	                    	@foreach($DB_table as $items)                   	
		                        <tr>
		                            <td id='{{$items->id}}'>{{++$i}}</td>
		                            <td><a href="{{route('NRGAdmin')}}/{{$routeLink}}/detail/{{$items->id}}">{{$items->name}}</a></td>	
		                            <td>{{$items->description_short}}</td>	
		                            <td class="box-center">{{$items->published}}</td>	
		                            <td class="tool tool__update box-center"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/update/{{$items->id}}"><span class="svg svg__edit"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-user-edit fa-w-20 fa-3x"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96zm406.6 204.1l-34.7-34.7c-6.3-6.3-14.5-9.4-22.8-9.4-8.2 0-16.5 3.1-22.8 9.4L327.8 424l-7.6 68.2c-1.2 10.7 7.2 19.8 17.7 19.8.7 0 1.3 0 2-.1l68.2-7.6 222.5-222.5c12.5-12.7 12.5-33.1 0-45.7zM393.3 473.7l-39.4 4.5 4.4-39.5 156.9-156.9 35 35-156.9 156.9zm179.5-179.5l-35-35L573 224h.1l.2.1 34.7 35-35.2 35.1zM134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 20.7 0 39.9 6.3 56 16.9l22.8-22.8c-22.2-16.2-49.3-26-78.8-26-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h243.5c-2.8-7.4-4.1-15.4-3.2-23.4l1-8.6H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320z" class=""></path></svg></span>Update</a></td>	
		                            <td class="tool tool__delete box-center"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/delete/{{$items->id}}"><span class='svg svg__delete'>		                            	<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-3x"><path fill="currentColor" d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z" class=""></path></svg>
		                            </span>Delete</a></td>	
		                        </tr>
	                        @endforeach
	                    </tbody>
	                </div>
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