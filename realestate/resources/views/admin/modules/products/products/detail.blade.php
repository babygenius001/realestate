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
	                <form id='form_Insert'>	                	
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>	                	
		                		<div class="flex_col">
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Name:</label>
											<input disabled type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" value="{{$DB_table->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Alias:</label>
											<input disabled type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto" value="{{$DB_table->alias}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Products type:</label>
														<a target='_blank'  href="{{route('NRGCTypes_getDetail',['id' => $DB_table->products_types_id])}}">{{$DB_table->m_products_types->name}}</a>
														<input disabled type="text"  class="group_input__item" id="i_url" name="url" placeholder="E.g. http://realestate.com.vn" value="{{$DB_table->m_products_types->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Products brand:</label>
											<a target='_blank'  href="{{route('NRGCBrands_getDetail',['id' => $DB_table->products_brands_id])}}">{{$DB_table->m_products_brands->name}}</a>
											<input disabled type="text"  class="group_input__item" id="i_url" name="url" placeholder="E.g. http://realestate.com.vn" value="{{$DB_table->m_products_brands->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                </div>
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Height:</label>
											<input disabled type="text"  class="group_input__item" id="i_height" name="height" placeholder="Height" value='{{$DB_table->height}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Width:</label>
											<input disabled type="text"  class="group_input__item" id="i_width" name="width" placeholder="Width" value='{{$DB_table->width}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Depth</label>
											<input disabled type="text"  class="group_input__item" id="i_depth" name="depth" placeholder="Depth" value='{{$DB_table->depth}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Weight</label>
											<input disabled type="text"  class="group_input__item" id="i_weight" name="weight" placeholder="Weight" value='{{$DB_table->weight}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>       
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Tag</label>
											<input disabled type="text"  class="group_input__item" id="i_tag" name="tag" placeholder="#tag" value='{{$DB_table->tag}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Keyword</label>
											<input disabled type="text"  class="group_input__item" id="i_keyword" name="keyword" placeholder="Keyword" value='{{$DB_table->keyword}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Customer</label>
											<input disabled type="text"  class="group_input__item" id="i_customers_id" name="customers_id" value='1'  value='{{$DB_table->customer_id}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>    			                		              			
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">Image:</label>
											<p class="group_input__help group_input__image"><img src='{{asset($DB_table->image)}}' id="i_image-show" alt="No image select"/></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description short:</label>
											<textarea disabled  name="description_short" id="i_description_short" class="group_input__text" placeholder="Something here">{{$DB_table->description_short}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea disabled  name="description" id="i_description" class="group_input__text" placeholder="Something here">{{$DB_table->description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
									</div>
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">New related</label>
											<input disabled type="date"  class="group_input__item" id="i_new_related" name="new_related" placeholder="date" value='{{$DB_table->new_related}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Hot:</label>
					                		@if($DB_table->is_hot == 1)
												Yes
					                		@else
												No
					                		@endif
											
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">New:</label>
					                		@if($DB_table->is_new == 1)
												Yes
					                		@else
												No
					                		@endif
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												Yes
					                		@else
												No
					                		@endif	
					                		<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input disabled type="number" id="i_ordering" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
											<p class="group_input__help"></p>
					                	</div>
		                			</div>

		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Title:</label>
											<input disabled type="text"  class="group_input__item" name="seo_title" id="i_seo_title" placeholder="Title"  value='{{$DB_table->seo_title}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Keyword:</label>
											<input disabled type="text"  class="group_input__item" name="seo_keyword" id="i_seo_keyword" placeholder="Keyword"  value='{{$DB_table->seo_keyword}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Description:</label>
											<textarea disabled  name="seo_description" class="group_input__text" id="i_seo_description" placeholder="Something here">{{$DB_table->seo_description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
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