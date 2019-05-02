@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	
@endsection

@section('y_dashboard_content')
	<form id="formData">
		<div class="form_group">
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/name')
            			@include('admin/blocks/formBlock/view/alias')
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Type:</label>
							<input disabled="disabled" class="group_input__item" id="i_products_types_id" name='products_types_id' value='{{$DB_table->m_products_types->name}}'>
							<p class="group_input__help"></p>
	                	</div>
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Brand:</label>
							<input disabled="disabled" class="group_input__item" id="i_products_brands_id" name='products_brands_id' value='{{$DB_table->m_products_brands->name}}'>
							<p class="group_input__help"></p>
	                	</div>
            		</div>	     

            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/height')
            			@include('admin/blocks/formBlock/view/width')
            			@include('admin/blocks/formBlock/view/depth')
            			@include('admin/blocks/formBlock/view/weight')
            		</div>       

            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/tag')
            			@include('admin/blocks/formBlock/view/keyword')
            		</div>    
            		<div class="group__item">
            			@include('admin/blocks/formBlock/view/seo')
            		</div>				
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
						
            			@include('admin/blocks/formBlock/view/image')
            			@include('admin/blocks/formBlock/view/description_short')
            			@include('admin/blocks/formBlock/view/description')
					</div>
        			<div class="group__item">
						@include('admin/blocks/formBlock/view/new_related')
            			@include('admin/blocks/formBlock/view/is_hot')
            			@include('admin/blocks/formBlock/view/is_new')
            			@include('admin/blocks/formBlock/view/ordering')
        			</div>
        			 
        		</div>
			</div>
		</div>
	    <p class="group_input__submit"><a href="{{route('NRGDashProducts_getUpdate',['id'=>$DB_table->id])}}">Update</a></p>
        <p class="group_input__submit"><a class="bg-red" href="
            {{route('NRGDashProducts_unpublish',['id'=>$DB_table->id])}}">Delete</a></p>	    
	    <p class="group_input__submit"><a href="
	    	{{route('NRGDashPosters_getNewId',['id'=>$DB_table->id])}}">New poster</a></p>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashProducts')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
	
@endsection