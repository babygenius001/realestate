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
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>tel</th>
	                            <th class="box-img">Image</th>
	                            <th>Published</th>
	                            <th>Update</th>
	                            <th>banned</th>
	                        </tr>
	                    </thead>
	                    <div>
	                    <tbody>
					    
	                    	@foreach($DB_table as $items)                   	


		                        <tr>
		                            <td id='{{$items->id}}'>{{$items->id}}</td>
		                            <td><a href="{{route('NRGAdmin')}}/{{$routeLink}}/detail/{{$items->id}}">{{$items->name}}</a></td>
		                            <td>{{$items->email}}</td>	
		                            <td>{{$items->tel}}</td>	
		                            <td class="box-img"><img src="{{asset($items->image)}}" alt="{{$items->name}}"/></td>	
		                            <td class="box-center">{{$items->published}}</td>	
		                            <td class="tool tool__update box-center"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/update/{{$items->id}}"><span class="svg svg__edit"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user-edit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-user-edit fa-w-20 fa-3x"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96zm406.6 204.1l-34.7-34.7c-6.3-6.3-14.5-9.4-22.8-9.4-8.2 0-16.5 3.1-22.8 9.4L327.8 424l-7.6 68.2c-1.2 10.7 7.2 19.8 17.7 19.8.7 0 1.3 0 2-.1l68.2-7.6 222.5-222.5c12.5-12.7 12.5-33.1 0-45.7zM393.3 473.7l-39.4 4.5 4.4-39.5 156.9-156.9 35 35-156.9 156.9zm179.5-179.5l-35-35L573 224h.1l.2.1 34.7 35-35.2 35.1zM134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 20.7 0 39.9 6.3 56 16.9l22.8-22.8c-22.2-16.2-49.3-26-78.8-26-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h243.5c-2.8-7.4-4.1-15.4-3.2-23.4l1-8.6H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320z" class=""></path></svg></span>Update</a></td>	

		                            <td class="tool tool__delete box-center"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/banned/{{$items->id}}"><span class='svg svg__delete'>		                            	<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="user-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-user-slash fa-w-20 fa-3x"><path fill="currentColor" d="M634 471L36 3.5C29.1-2 19-.9 13.5 6l-10 12.5C-2 25.4-.9 35.5 6 41l598 467.5c6.9 5.5 17 4.4 22.5-2.5l10-12.5c5.5-6.9 4.4-17-2.5-22.5zM320 48c52.9 0 96 43.1 96 96 0 28.1-12.4 53.3-31.8 70.8l38.4 30c25.5-26 41.4-61.5 41.4-100.8C464 64.5 399.5 0 320 0c-51.9 0-97 27.7-122.4 68.9l38.2 29.9C252.1 68.7 283.5 48 320 48zM144 464v-25.6c0-47.6 38.8-86.4 86.4-86.4 4.2 0 9.5 1.2 16.4 3.6 23.7 8.3 48.3 12.4 73.2 12.4 8 0 15.9-1.1 23.8-2l-66.4-51.9c-4.9-1.3-10-2.2-14.8-3.8-10.4-3.6-21.2-6.2-32.2-6.2C156.2 304 96 364.2 96 438.4V464c0 26.5 21.5 48 48 48h352c9.3 0 17.9-2.8 25.2-7.3l-52-40.7H144z" class=""></path></svg>
		                            </span>
		                            @if($items->banned == 0)
		                            	{{'None'}}
		                            @else
		                            	{{'Banned'}}
		                            @endif 
		                        	</a></td>	
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