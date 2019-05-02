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
	                <form action='{{$DB_table->id}}' method="post" enctype="multipart/form-data" id='form_Insert'>	                
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>	                	
		                		<div class="flex_col">
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Name:</label>
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" value="{{$DB_table->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Alias:</label>
											<input type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto" value="{{$DB_table->alias}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Products type:</label>
											<a target='_blank' href="{{route('NRGCTypes_getDetail',['id' => $DB_table->products_types_id])}}">{{$DB_table->m_products_types->name}}</a>
											<select name="products_types_id" class="group_input__select" id="i_products_types_id">
												@foreach($craw_products_types as $types_item)
													@if($types_item->id == $DB_table->products_types_id)
														<option value="{{$types_item->id}}" selected='selected'>{{$types_item->name}}</option>
													@else
														<option value="{{$types_item->id}}">{{$types_item->name}}</option>
													@endif
									    		@endforeach
											</select>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Products brand:</label>
											<a  target='_blank' href="{{route('NRGCBrands_getDetail',['id' => $DB_table->products_brands_id])}}">{{$DB_table->m_products_brands->name}}</a>
											<select class="group_input__select" id="i_products_brands_id" name='products_brands_id'>
												@foreach($craw_products_brands as $brands_item)
													@if($brands_item->id == $DB_table->products_brands_id)
														<option value="{{$brands_item->id}}" selected='selected'>{{$brands_item->name}}</option>
													@else
														<option value="{{$brands_item->id}}">{{$brands_item->name}}</option>
													@endif
									    		@endforeach
											</select>
											<p class="group_input__help"></p>
					                	</div>
					                </div>
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Height:</label>
											<input type="text"  class="group_input__item" id="i_height" name="height" placeholder="Height" value='{{$DB_table->height}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Width:</label>
											<input type="text"  class="group_input__item" id="i_width" name="width" placeholder="Width" value='{{$DB_table->width}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Depth</label>
											<input type="text"  class="group_input__item" id="i_depth" name="depth" placeholder="Depth" value='{{$DB_table->depth}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Weight</label>
											<input type="text"  class="group_input__item" id="i_weight" name="weight" placeholder="Weight" value='{{$DB_table->weight}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>       
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Tag</label>
											<input type="text"  class="group_input__item" id="i_tag" name="tag" placeholder="#tag" value='{{$DB_table->tag}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Keyword</label>
											<input type="text"  class="group_input__item" id="i_keyword" name="keyword" placeholder="Keyword" value='{{$DB_table->keyword}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Customer</label>
											<input type="text"  class="group_input__item" id="i_customers_id" name="customers_id" value='1'  value='{{$DB_table->customer_id}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>    			                		              			
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">Image:</label>
											<input type="file"  class="group_input__item" id="i_image" name="image">
											<p class="group_input__help group_input__image"><img src='{{asset($DB_table->image)}}' id="i_image-show" alt="No image select"/></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description short:</label>
											<textarea name="description_short" id="i_description_short" class="group_input__text" placeholder="Something here">{{$DB_table->description_short}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea name="description" id="i_description" class="group_input__text" placeholder="Something here">{{$DB_table->description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
									</div>
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">New related</label>
											<input type="date"  class="group_input__item" id="i_new_related" name="new_related" placeholder="date" value='{{$DB_table->new_related}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Hot:</label>
					                		@if($DB_table->is_new == 1)
												<input type="radio" id='is_hot_true' class="group_input__item" checked="checked" name="is_hot" value="1"/>
						                		<label for="is_hot_true">Yes</label>
												<input type="radio" id='is_hot_false' class="group_input__item" name="is_hot" value="0"/>
						                		<label for="is_hot_false">No</label>
					                		@else
												<input type="radio" id='is_hot_true' class="group_input__item" name="is_hot" value="1"/>
						                		<label for="is_hot_true">Yes</label>
												<input type="radio" checked="checked" id='is_hot_false' class="group_input__item" name="is_hot" value="0"/>
						                		<label for="is_hot_false">No</label>
					                		@endif
											
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">New:</label>
					                		@if($DB_table->is_new == 1)
												<input type="radio" id='is_new_true' class="group_input__item" checked="checked" name="is_new" value="1"/>
						                		<label for="is_new_true">Yes</label>
												<input type="radio" id='is_new_false' class="group_input__item" name="is_new" value="0"/>
						                		<label for="is_new_false">No</label>
					                		@else
												<input type="radio" id='is_new_true' class="group_input__item" name="is_new" value="1"/>
						                		<label for="is_new_true">Yes</label>
												<input type="radio" id='is_new_false' class="group_input__item" checked="checked" name="is_new" value="0"/>
						                		<label for="is_new_false">No</label>
					                		@endif
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												<input type="radio" id='pubslished_true' class="group_input__item" checked="checked" name="published" value="1">
						                		<label for="pubslished_true">Yes</label>
												<input type="radio" id='pubslished_false' class="group_input__item" name="published" value="0">
						                		<label for="pubslished_false">No</label>
						                	@else 
												<input type="radio" id='pubslished_true' class="group_input__item" name="published" value="1">
						                		<label for="pubslished_true">Yes</label>
												<input type="radio" id='pubslished_false' class="group_input__item" checked="checked" name="published" value="0">
						                		<label for="pubslished_false">No</label>
					                		@endif											
					                		<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input type="number" id="i_ordering" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
											<p class="group_input__help"></p>
					                	</div>
		                			</div>

		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Title:</label>
											<input type="text"  class="group_input__item" name="seo_title" id="i_seo_title" placeholder="Title"  value='{{$DB_table->seo_title}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Keyword:</label>
											<input type="text"  class="group_input__item" name="seo_keyword" id="i_seo_keyword" placeholder="Keyword"  value='{{$DB_table->seo_keyword}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Description:</label>
											<textarea name="seo_description" class="group_input__text" id="i_seo_description" placeholder="Something here">{{$DB_table->seo_description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
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