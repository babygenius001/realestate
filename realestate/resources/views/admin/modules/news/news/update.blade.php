@extends('admin/templates/admin_template')

{{-- css --}}
	@section('admin_css')
			
			<link rel="stylesheet" type="text/css" href="{{asset('css/admin/home.css')}}"/>
	@endsection
{{-- end css --}}


{{-- js --}}
	@section('admin_js')
		<script src="{{asset('libraries/ckeditor/ckeditor.js')}}"></script>
    	<script src="{{asset('js/admin/popupnewwindow.js')}}"></script>
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
										@include('admin/blocks/formBlock/update/title')
										@include('admin/blocks/formBlock/update/summary')

			                		</div>    
									<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">Group news:</label>
											<select id="i_news_categories_id" class="group_input__item" name="news_categories_id"/>
												@foreach($DB_table_categories as $categories_items)
													@if($categories_items->id == $DB_table->news_categories_id)
														{!!"<option selected='selected' value='$categories_items->id'>$categories_items->name</option>"!!}
														@continue
													@endif
													
													{!!"<option value='$categories_items->id'>$categories_items->name</option>"!!}
												@endforeach
											</select>
											<p class="group_input__help"></p>
					                	</div> 
									</div> 			
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										@include('admin/blocks/formBlock/update/image')
									</div>
			                		<div class="group__item">
										@include('admin/blocks/formBlock/update/new_related')
										@include('admin/blocks/formBlock/update/is_hot')
										@include('admin/blocks/formBlock/update/is_new')
										@include('admin/blocks/formBlock/update/show_in_homepage')
										@include('admin/blocks/formBlock/update/published')
		                			</div>
		                		</div>
		                		<div class="flex_col"  style="width:100%">
									@include('admin/blocks/formBlock/update/creator')
									@include('admin/blocks/formBlock/update/source_website')
									@include('admin/blocks/formBlock/update/content')
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										@include('admin/blocks/formBlock/update/tag')
										@include('admin/blocks/formBlock/update/keyword')
		                			</div>
		                			<div class="group__item">
										@include('admin/blocks/formBlock/update/description_short')
										@include('admin/blocks/formBlock/update/description')
		                			</div>
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										@include('admin/blocks/formBlock/update/seo')
			                		</div>
			                		<div class="group__item">
										@include('admin/blocks/formBlock/update/ordering')
			                		</div>
		                		</div>
		                	</div>
	                	</div>
	                	<p class="group_input__submit"><input type="submit" name="submit" value="Update"></p>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	           
			<div class="group_get_image">
				<select name="get_image" id="i_get_image">
					@foreach($DB_table_img_group as $img_group_item)
						{!!"<option value='" . route('NRGCImages_groups_getLink',['id'=>$img_group_item->id]) . "'>$img_group_item->name</option>"!!}
					@endforeach
				</select>
				<a class="popup" href="javascript:void(0)">open</a>
			</div>
	    </div>
	    <script>
           CKEDITOR.replace('i_content');
       </script> 
	@endsection
{{-- end content --}}