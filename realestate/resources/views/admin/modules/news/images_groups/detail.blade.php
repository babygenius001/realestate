@extends('admin/templates/admin_template')

{{-- css --}}
	@section('admin_css')
			
			<link rel="stylesheet" type="text/css" href="{{asset('css/admin/home.css')}}"/>
	@endsection
{{-- end css --}}


{{-- js --}}
	@section('admin_js')
   		<script src="{{asset('js/admin/imagescale.js')}}"></script>
	@endsection
{{-- end js --}}


{{-- content --}}
		@section('admin_content')
		<div class="panel panel-default">
	        <div class="panel-heading">
		        @if(isset($title))
	                {{$title}}{{' data'}}
	            @else 
	                {{'Data'}}
	            @endif
	        </div>
			
	        <div class="panel-body">
	            <div class="table-responsive">
	                <form method="post" id='form_Insert'>	                	
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>
		                		<div class="flex_col">
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Name:</label>
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" disabled="disabled" value="{{$DB_table->name}}" />
											<p class="group_input__help"></p>
					                	</div>
			                		</div>	          			
			                		
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Description short:</label>
											<textarea disabled="disabled" name="description_short" id="i_description_short" class="group_input__text" placeholder="Something here">{{$DB_table->description_short}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea disabled="disabled" name="description" id="i_description" class="group_input__text" placeholder="Something here">{{$DB_table->description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                				                	
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												<input type="text" class="group_input__item" disabled="disabled" value="Yes">
						                	@else 
												
						                		<input type="text" class="group_input__item"  disabled="disabled" value="No">
					                		@endif
											
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input type="number" id="i_ordering" disabled="disabled" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
											<p class="group_input__help"></p>
					                	</div>
			                		</div>     	
		                		</div>
		                		<div class="flex_col">
					                <label class="group_input__title" for="">Image:</label>
		                			<div class="group__item group_grid">
		                				@foreach($DB_table_images as $items)
		                					
											<div class='group_input group_grid_item'>
											<p class="group_input__help group_input__image" style="max-width: 100%; cursor: pointer;"><img src='{{asset($items->image)}}' class="i_image-show" alt="{{$items->name}}"/></p>
											<p class="box-center"><a title="{{$items->name}}" href="{{route('NRGCNewsImages_getDetail',['id'=>$items->id])}}">{{$items->name}}</a></p>
					                	</div>
		                				@endforeach
										
									</div>
		                		</div>
		                	</div>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	        
	        <div class='img_zoomscare'>
	        	<img src="http://localhost/realestate/public/images/noimages.jpg" id="img_zoomscare-show" alt="item 111detail.blade.php">
	        </div>
	    </div>
	@endsection
{{-- end content --}}