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
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Group:</label>
					                		<a href="{{route('NRGCImages_groups_getDetail',['id'=>$DB_table->news_images_groups_id])}}"> &laquo; {{$DB_table->m_news_images_groups->name}} &raquo;</a> 
											<input type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto" disabled="disabled" value="{{$DB_table->m_news_images_groups->name}}" />
											<p class="group_input__help"></p>

					                	</div>
			                		</div>
			                		
			                		<div class="group__item">
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
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">Image:</label>
											
											<p class="group_input__help group_input__image" style='height: 100%;'><img src='{{asset($DB_table->image)}}' id="i_image-show" alt="No image select"/></p>
					                	</div>
									</div>
		                		</div>
		                	</div>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	        
	    </div>
	@endsection
{{-- end content --}}