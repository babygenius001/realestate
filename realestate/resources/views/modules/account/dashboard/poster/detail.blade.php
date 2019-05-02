@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	<script src="{{asset('libraries/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('y_dashboard_content')
	<form id="formData">
		<div class="form_group">
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/name')
            		</div>	          
            		<div class="group__item">
            			<div class='group_input'>
	                		<label class="group_input__title" for="">Product:</label>
							<input disabled='disabled' class="group_input__item" type="text" value="{{$DB_table->m_products->name}}">
							<p class="group_input__help"></p>
	                	</div>
	                	
            		</div>
            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/tag')
            			@include('admin/blocks/formBlock/view/keyword')
            		</div>  
                    <div class="group__item">
                        @include('admin/blocks/formBlock/view/new_related')
                        @include('admin/blocks/formBlock/view/ordering')
                    </div>  			
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
						
            			@include('admin/blocks/formBlock/view/image')
	                	
					</div>
        				 
        		</div>
        		<div class="flex_col" style="width: 100%;">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/view/title')
            			@include('admin/blocks/formBlock/view/summary')
            			@include('admin/blocks/formBlock/view/content')
					</div>
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/view/seo')
            		</div>
        		</div>
        		<div class="flex_col">
        			<div class="group_item">
            			@include('admin/blocks/formBlock/view/description_short')
            			@include('admin/blocks/formBlock/view/description')
        			</div>
        		</div>
			</div>
		</div>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashPosters')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
 		<script>
           CKEDITOR.replace('i_content');
       	</script> 
@endsection