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
	                <form action="{{route('NRPCSlides_postInsert')}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>

		                		<div class="flex_col">
			                		<div class="group__item">
			                			@include('admin/blocks/formBlock/insert/name')
			                			@include('admin/blocks/formBlock/insert/alias')
			                			<div class='group_input'>
											<label class="group_input__title" for="i_slides_categories_id">Category</label>
											<select  class="group_input__item" id="i_slides_categories_id" name="slides_categories_id">
												@foreach($DB_slides_categories as $slides_categories_items)
													{!!"<option value='$slides_categories_items->id'>$slides_categories_items->name</option>"!!}
												@endforeach
											</select>
											<p class="group_input__help"></p>
										</div>
			                			@include('admin/blocks/formBlock/insert/summary')
			                			@include('admin/blocks/formBlock/insert/description_short')
			                		</div>    
		                		</div>
		                		<div class="flex_col">
			                		<div class="group__item">
			                			@include('admin/blocks/formBlock/insert/image')
			                			@include('admin/blocks/formBlock/insert/url')
			                			@include('admin/blocks/formBlock/insert/ordering')
			                			@include('admin/blocks/formBlock/insert/description')
			                			@include('admin/blocks/formBlock/insert/published')
		                			</div>
		                		</div>
		                	</div>
	                	</div>
	                	<p  class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	    </div>


	    <script>
           CKEDITOR.replace('i_content');
       </script> 
	@endsection
{{-- end content --}}