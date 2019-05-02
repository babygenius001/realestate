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
	                <form action="{{$DB_table->id}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>

		                		<div class="flex_col">
			                		<div class="group__item">
										@include('admin/blocks/formBlock/update/name')
										@include('admin/blocks/formBlock/update/alias')
										<div class='group_input'>
											<label class="group_input__title" for="i_slides_categories_id">Category</label>
											<select  class="group_input__item" id="i_slides_categories_id" name="slides_categories_id">
												<option selected='selected' value='{{$DB_table->slides_categories_id}}'>{{$DB_table->m_slides_categories->name}}</option>
												@foreach($DB_slides_categories as $slides_categories_items)
													{!!"<option value='$slides_categories_items->id'>$slides_categories_items->name</option>"!!}
												@endforeach
											</select>
											<p class="group_input__help"></p>
										</div>
										@include('admin/blocks/formBlock/update/summary')
			                			@include('admin/blocks/formBlock/update/description_short')
			                		</div>    
												
		                		</div>
		                		<div class="flex_col">
			                		<div class="group__item">
										@include('admin/blocks/formBlock/update/image')
			                			@include('admin/blocks/formBlock/update/url')
			                			@include('admin/blocks/formBlock/update/ordering')
			                			@include('admin/blocks/formBlock/update/description')
			                			@include('admin/blocks/formBlock/update/published')
		                			</div>
		                		</div>
		                	</div>
	                	</div>
	                	<p class="group_input__submit"><input type="submit" name="submit" value="Update"></p>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	    </div>
	@endsection
{{-- end content --}}