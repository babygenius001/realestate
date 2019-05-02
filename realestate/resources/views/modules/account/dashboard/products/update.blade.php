@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{$DB_table->id}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form_group">
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/update/name')
            			@include('admin/blocks/formBlock/update/alias')
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Category:</label>
							<select class="group_input__select" id="i_products_category" name='products_category'>
								@foreach($craw_products_categories as $categories_item)
									<option value="{{$categories_item->id}}">{{$categories_item->name}}</option>
					    		@endforeach
							</select>
							<p class="group_input__help"></p>
	                	</div>
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Type name:</label>
							<select class="group_input__select" id="i_products_types_id" name='products_types_id'>
								<option selected="selected" value="{{$DB_table->products_types_id}}">{{$DB_table->m_products_types->name}}</option>
							</select>
							<p class="group_input__help"></p>
	                	</div>
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Brand name:</label>
							<select name="products_brands_id" class="group_input__select" id="i_products_brands_id">
								<option selected="selected" value="{{$DB_table->products_types_id}}">{{$DB_table->m_products_brands->name}}</option>

								@foreach($craw_products_brands as $brands_item)
									<option value="{{$brands_item->id}}">{{$brands_item->name}}</option>
					    		@endforeach
							</select>
							<p class="group_input__help"></p>
	                	</div>
            		</div>	     

            		<div class="group__item">
            			@include('admin/blocks/formBlock/update/height')
            			@include('admin/blocks/formBlock/update/width')
            			@include('admin/blocks/formBlock/update/depth')
            			@include('admin/blocks/formBlock/update/weight')
            		</div>       

            		<div class="group__item">
            			@include('admin/blocks/formBlock/update/tag')
            			@include('admin/blocks/formBlock/update/keyword')
            		</div>    		
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
						
            			@include('admin/blocks/formBlock/update/image')
            			@include('admin/blocks/formBlock/update/description_short')
            			@include('admin/blocks/formBlock/update/description')
					</div>
        			<div class="group__item">
						@include('admin/blocks/formBlock/update/new_related')
            			@include('admin/blocks/formBlock/update/is_hot')
            			@include('admin/blocks/formBlock/update/is_new')
            			@include('admin/blocks/formBlock/update/ordering')
        			</div>
        			 
            		<div class="group__item">
            			@include('admin/blocks/formBlock/update/seo')
            		</div>		
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="Update"></p>
	    <p class="group_input__submit"><a class="bg-red" href="{{route('NRGDashProducts')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
	<script>
		$(document).ready(function(){
			$('#i_products_category').change(function(){
				var id_cate = $(this).val();
				$.get("../../ajax/products_categories/" + id_cate,function(data){
					$('#i_products_types_id').html(data);
				});
			});
		});
	</script>
@endsection