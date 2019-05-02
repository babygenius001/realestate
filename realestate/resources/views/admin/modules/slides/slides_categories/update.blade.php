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
										@include('admin/blocks/formBlock/update/description_short')
										@include('admin/blocks/formBlock/update/description')
			                		</div>    
												
		                		</div>
		                		<div class="flex_col">
			                		<div class="group__item">
										<div class='group_input'>
											<label class="group_input__title" for="i_height">Height</label>
											<input type="text"  class="group_input__item" id="i_height" name="height" placeholder="Ex: px, %,.. " value="{{$DB_table->height}}"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_height_small">Min Height</label>
											<input type="text"  class="group_input__item" id="i_height_small" name="height_small" placeholder="Ex: px, %,.. " value="{{$DB_table->height_small}}"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_width">Width</label>
											<input type="text"  class="group_input__item" id="i_width" name="width" placeholder="Ex: px, %,.. " value="{{$DB_table->width}}"/>
											<p class="group_input__help"></p>
										</div>
										<div class='group_input'>
											<label class="group_input__title" for="i_width_small">Min Width</label>
											<input type="text"  class="group_input__item" id="i_width_small" name="width_small" placeholder="Ex: px, %,.. " value="{{$DB_table->width_small}}"/>
											<p class="group_input__help"></p>
										</div>
										@include('admin/blocks/formBlock/update/ordering')
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