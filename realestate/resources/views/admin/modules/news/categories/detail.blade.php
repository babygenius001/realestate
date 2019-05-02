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
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" disabled="disabled" value="{{$DB_table->name}}" />
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Alias:</label>
											<input type="text"  class="group_input__item" id="i_alias" name="alias" placeholder="Auto" disabled="disabled" value="{{$DB_table->alias}}" />
											<p class="group_input__help"></p>
					                	</div>
			                		</div>	          			
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Parent:</label>
										
											<select class="group_input__item" name="parent_id" id="i_parent_id" disabled="disabled">
												<option value="---">---</option>
												@if($DB_treee != null)
													@foreach($DB_treee as $items) 
														@if($items->id == $DB_table->parent_id)
															<option selected="selected" value="{{$items->id}}">
														@else 
															<option value="{{$items->id}}">
														@endif
															{{$items->name}}

														</option>
														{{getTreeParent($items->id,$DB_table->parent_id)}}
													@endforeach
												@endif
											</select>
											<p class="group_input__help"></p>
					                	</div>
			                		</div>
			                		<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Description short:</label>
											<textarea disabled="disabled" name="description_short" id="i_description_short" class="group_input__text" placeholder="Something here">{{$DB_table->description_short}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea disabled="disabled" name="description" id="i_description" class="group_input__text" placeholder="Something here">{{$DB_table->description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Show in homepage:</label>
					                		@if($DB_table->show_in_homepage == 1)
												<input type="text" class="group_input__item" disabled="disabled" value="Yes">
					                		@else 
						                		
						                		<input type="text" class="group_input__item"  disabled="disabled" value="No">
						                	@endif
 											<p class="group_input__help"></p>
					                	</div>					                	
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												<input type="text" class="group_input__item" disabled="disabled" value="Yes">
						                	@else 
												
						                		<input type="text" class="group_input__item"  disabled="disabled" value="No">
					                		@endif
											
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input type="number" id="i_ordering" disabled="disabled" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
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
									</div>
									<div class="group__item">
											<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Title:</label>
											<input type="text"  disabled="disabled" class="group_input__item" name="seo_title" id="i_seo_title" value="{{$DB_table->seo_title}}" placeholder="Title"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Keyword:</label>
											<input type="text"  disabled="disabled" class="group_input__item" name="seo_keyword" id="i_seo_keyword" value="{{$DB_table->seo_keyword}}" placeholder="Keyword"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">SEO Description:</label>
											<textarea name="seo_description" class="group_input__text" id="i_seo_description" disabled="disabled" placeholder="Something here">{{$DB_table->seo_description}}</textarea>
											<p class="group_input__help"></p>
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