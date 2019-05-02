@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	<script src="{{asset('libraries/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{route('NRGDashPosters_postNew')}}" method="post" enctype="multipart/form-data">
		<div class="form_group">
			{{ csrf_field() }}
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/name')
            			@include('admin/blocks/formBlock/insert/alias')
            		</div>	          
            		<div class="group__item">
            			<div class='group_input'>
	                		<label class="group_input__title" for="">Product: {{$DB_table->name}}</label>
							<input type='text' class="group_input__item visible" id="i_products_id" name='products_id' value="{{$DB_table->id}}">
							<p class="group_input__help"></p>
	                	</div>
	                	
            		</div>
            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/tag')
            			@include('admin/blocks/formBlock/insert/keyword')
            		</div>    			
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
						
            			@include('admin/blocks/formBlock/insert/image')
	                	
					</div>
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/new_realated')
            			@include('admin/blocks/formBlock/insert/ordering')
        			</div>
        				 
        		</div>
        		<div class="flex_col" style="width: 100%;">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/title')
            			@include('admin/blocks/formBlock/insert/summary')
            			@include('admin/blocks/formBlock/insert/content')
					</div>
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/seo')
            		</div>
        		</div>
        		<div class="flex_col">
        			<div class="group_item">
            			@include('admin/blocks/formBlock/insert/description_short')
            			@include('admin/blocks/formBlock/insert/description')
        			</div>
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashPosters')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
       <script>
           CKEDITOR.replace('i_content');
       </script> 
@endsection