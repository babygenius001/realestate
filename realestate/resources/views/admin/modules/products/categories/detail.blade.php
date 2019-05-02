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
	                <form method="post" id='form_Insert'>	                	
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>
		                		<div class="flex_col">
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Name:</label>
											<input disabled  type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" value="{{$DB_table->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Alias:</label>
											<input disabled  type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto" value="{{$DB_table->alias}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Abbreviation:</label>
											<input disabled  type="text"  class="group_input__item" id="i_abbreviation" name="abbreviation" placeholder="E.g. LG, Sony, etc,.." value="{{$DB_table->abbreviation}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Abbreviation:</label>
											<input disabled  type="text"  class="group_input__item" id="i_abbreviation" name="abbreviation" placeholder="E.g. LG, Sony, etc,.." value="{{$DB_table->abbreviation}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">URL:</label>
											<input disabled  type="text"  class="group_input__item" id="i_url" name="url" placeholder="E.g. http://realestate.com.vn" value="{{$DB_table->url}}" />
											<p class="group_input__help"></p>
					                	</div>
			                		</div>	
			                		<div class="group__item">
				                		<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Title:</label>
											<input disabled  type="text"  class="group_input__item" name="seo_title" id="i_seo_title" placeholder="Title" value="{{$DB_table->seo_title}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Keyword:</label>
											<input disabled  type="text"  class="group_input__item" name="seo_keyword" id="i_seo_keyword" placeholder="Keyword" value="{{$DB_table->seo_keyword}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Description:</label>
											<textarea disabled  name="seo_description" class="group_input__text" id="i_seo_description" placeholder="Something here">{{$DB_table->seo_description}}</textarea>
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
					                		<label class="group_input__title" for="">Icon:</label>
											
											<p class="group_input__help group_input__image"><img src='{{asset($DB_table->icon)}}' id="i_icon-show" alt="No image select"/></p>
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
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Keyword - Keysearch:</label>
											<input disabled  type="text"  class="group_input__item" id="i_keyword" name="keyword" placeholder="Smart phone, Teddy, Etc,.." value="{{$DB_table->keyword}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												<input disabled  type="radio" id='pubslished_true' class="group_input__item" checked="checked" name="published" value="1">
						                		<label for="pubslished_true">Yes</label>
												<input disabled  type="radio" id='pubslished_false' class="group_input__item" name="published" value="0">
						                		<label for="pubslished_false">No</label>
						                	@else 
												<input disabled  type="radio" id='pubslished_true' class="group_input__item" name="published" value="1">
						                		<label for="pubslished_true">Yes</label>
												<input disabled  type="radio" id='pubslished_false' class="group_input__item" checked="checked" name="published" value="0">
						                		<label for="pubslished_false">No</label>
					                		@endif
											
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input disabled  type="number" id="i_ordering" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
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