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
	                {{$title}}{{' data - Category: '}} 
	            @else 
	                {{'Data'}}
	            @endif
	        </div>
	        <div class="panel-body">
	            <div class="table-responsive">
	               <form id='form_Insert'>	                	
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>

		                		<div class="flex_col">
			                		<div class="group__item">
										@include('admin/blocks/formBlock/view/name')
										@include('admin/blocks/formBlock/view/alias')
										<div class='group_input'>
											<label class="group_input__title" for="i_slides_categories_id">Category</label>
											<input type="text" disabled="disabled"  class="group_input__item"  value='{{$DB_table->m_slides_categories->name}}'>
											<p class="group_input__help"></p>
										</div>
										@include('admin/blocks/formBlock/view/summary')
			                			@include('admin/blocks/formBlock/view/description_short')
			                		</div>    
												
		                		</div>
		                		<div class="flex_col">
			                		<div class="group__item">
										@include('admin/blocks/formBlock/view/image')
			                			@include('admin/blocks/formBlock/view/url')
			                			@include('admin/blocks/formBlock/view/ordering')
			                			@include('admin/blocks/formBlock/view/description')
			                			@include('admin/blocks/formBlock/view/published')
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