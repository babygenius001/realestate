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
	                <form action="{{route('NRPCNewCategories_postInsert')}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>
		                		<div class="flex_col">
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Name:</label>
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Alias:</label>
											<input type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto"/>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Parent:</label>
										
											<select class="group_input__item" name="parent_id" id="i_parent_id">
												<option selected="selected" value="---">---</option>
												@if($DB_table != null)
													@foreach($DB_table as $items) 
														<option value="{{$items->id}}">
															{{$items->name}}
														</option>
														{{getTreeParent($items->id)}}
													@endforeach
												@endif
											</select>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Description short:</label>
											<textarea name="description_short" id="i_description_short" class="group_input__text" placeholder="Something here"></textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea name="description" id="i_description" class="group_input__text" placeholder="Something here"></textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
											<input type="radio" id='pubslished_true' class="group_input__item" checked="checked" name="published" value="1"/>
					                		<label for="pubslished_true">Yes</label>
											<input type="radio" id='pubslished_false' class="group_input__item" name="published" value="0"/>
					                		<label for="pubslished_false">No</label>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Show in homepage:</label>
											<input type="radio" id='show_in_homepage_true' class="group_input__item" checked="checked" name="show_in_homepage" value="1"/>
					                		<label for="pubslished_true">Yes</label>
											<input type="radio" id='show_in_homepage_false' class="group_input__item" name="show_in_homepage" value="0"/>
					                		<label for="pubslished_false">No</label>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input type="number" id="i_ordering" class="group_input__item" name="ordering" value='1'/>
											<p class="group_input__help"></p>
					                	</div> 
			                		</div>     			
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
										<div class='group_input'>
					                		<label class="group_input__title" for="">Image:</label>
											<input type="file"  class="group_input__item" id="i_image" name="image"/>
											<p class="group_input__help group_input__image"><img src='{{asset('images/noimages.jpg')}}' id="i_image-show" alt="No image select"/></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Icon:</label>
											<input type="file"  class="group_input__item" id="i_icon" name="icon"/>
											<p class="group_input__help group_input__image"><img src='{{asset('images/noimages.jpg')}}' id="i_icon-show" alt="No image select"/></p>
					                	</div>	
					                	<div class="group__item">
				                			
									</div>
									<div class="group__item">
											<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Title:</label>
											<input type="text"  class="group_input__item" name="seo_title" id="i_seo_title" placeholder="Title"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Keyword:</label>
											<input type="text"  class="group_input__item" name="seo_keyword" id="i_seo_keyword" placeholder="Keyword"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Description:</label>
											<textarea name="seo_description" class="group_input__text" id="i_seo_description" placeholder="Something here"></textarea>
											<p class="group_input__help"></p>
					                	</div>
									</div>
		                		</div>
		                	</div>
	                	</div>
	                	<p  class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	                	<p class="group_input__submit"><a href="{{route('NRGAdmin')}}/{{$routeLink}}/list">Back</a></p>
	                </form>
	            </div>
	        </div>
	        
	    </div>
	@endsection
{{-- end content --}}