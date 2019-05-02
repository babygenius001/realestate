@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{route('NRPDashProducts_postNew')}}" method="post" enctype="multipart/form-data">
		<div class="form_group">
			{{ csrf_field() }}
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/name')
            			@include('admin/blocks/formBlock/insert/alias')
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
							</select>
							<p class="group_input__help"></p>
	                	</div>
	                	<div class='group_input'>
	                		<label class="group_input__title" for="">Brand name:</label>
							<select name="products_brands_id" class="group_input__select" id="i_products_brands_id">
								@foreach($craw_products_brands as $brands_item)
									<option value="{{$brands_item->id}}">{{$brands_item->name}}</option>
					    		@endforeach
							</select>
							<p class="group_input__help"></p>
	                	</div>
            		</div>	     

            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/height')
            			@include('admin/blocks/formBlock/insert/width')
            			@include('admin/blocks/formBlock/insert/depth')
            			@include('admin/blocks/formBlock/insert/weight')
            		</div>       

            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/tag')
            			@include('admin/blocks/formBlock/insert/keyword')
            		</div>    			
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
						
            			@include('admin/blocks/formBlock/insert/image')
            			@include('admin/blocks/formBlock/insert/description_short')
            			@include('admin/blocks/formBlock/insert/description')
	                	
					</div>
        			<div class="group__item">

            			@include('admin/blocks/formBlock/insert/new_realated')
            			@include('admin/blocks/formBlock/insert/is_hot')
            			@include('admin/blocks/formBlock/insert/is_new')
            			@include('admin/blocks/formBlock/insert/ordering')
        			</div>
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/seo')
            		</div>	 
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashProducts')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
	<script>
		$(document).ready(function(){
			$(function() {
			    var id_cate = $('#i_products_category').val();
				$.get("../../dashboard/ajax/products_categories/" + id_cate,function(data){
					$('#i_products_types_id').html(data);
				});
			});
			$('#i_products_category').change(function(){
				var id_cate = $(this).val();
				$.get("../../dashboard/ajax/products_categories/" + id_cate,function(data){
					$('#i_products_types_id').html(data);
				});
			});
		});
	</script>
@endsection
