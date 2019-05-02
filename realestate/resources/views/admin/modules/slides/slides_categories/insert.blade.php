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
	                <form action="{{route('NRPCSlides_categories_postInsert')}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>

		                		<div class="flex_col">
			                		<div class="group__item">
			                			@include('admin/blocks/formBlock/insert/name')
			                			@include('admin/blocks/formBlock/insert/alias')
			                			@include('admin/blocks/formBlock/insert/description_short')
			                			@include('admin/blocks/formBlock/insert/description')
			                		</div>    
		                		</div>
		                		<div class="flex_col">
		                			
			                		<div class="group__item">
										<div class='group_input'>
											<label class="group_input__title" for="i_height">Height</label>
											<input type="text"  class="group_input__item" id="i_height" name="height" placeholder="Ex: px, %,.. " value="400px"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_height_small">Min Height</label>
											<input type="text"  class="group_input__item" id="i_height_small" name="height_small" placeholder="Ex: px, %,.. " value="400px"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_width">Width</label>
											<input type="text"  class="group_input__item" id="i_width" name="width" placeholder="Ex: px, %,.. " value="100%"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_width_small">Min Width</label>
											<input type="text"  class="group_input__item" id="i_width_small" name="width_small" placeholder="Ex: px, %,.. " value="100%"/>
											<p class="group_input__help"></p>
										</div>
			                			@include('admin/blocks/formBlock/insert/ordering')
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