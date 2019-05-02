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
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" disabled="disabled" value='{{$DB_table->name}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Email:</label>
											<input type="text"  class="group_input__item" id="i_name" name="name" placeholder="Name" disabled="disabled" value='{{$DB_table->email}}'/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Tel:</label>
											<input type="text"  class="group_input__item" disabled="disabled" id="i_tel" name="tel" placeholder="Tel" value='{{$DB_table->tel}}'/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class="group_input">
					                		<label class="group_input__title" for="">Date of birth</label>
											<input type="date" class="group_input__item" disabled="disabled" id="i_date_of_birth" name="date_of_birth" placeholder="date" value="{{$DB_table->date_of_birth}}">
											<p class="group_input__help"></p>
					                	</div>
					                </div>
			                		<div class="group__item">
								       	<div class="group_input">
				                			<label class="group_input__title" for="">Address</label>
				                			<ul style="list-style: none; padding-left: 20px;">
					                			@foreach($DB_table->m_customers_addresses as $addresses)
				                					<li style="padding: 10px 0;><p class="group_input__help">{{$addresses->address}}</p></li>
											    @endforeach
				                			</ul>
					                	</div>
			                			
					                	<div class="group_input">
					                		<label class="group_input__title" for="">Date of birth</label>
											<input type="date" class="group_input__item" disabled="disabled" id="i_date_of_birth" name="date_of_birth" placeholder="date" value="{{$DB_table->date_of_birth}}">
											<p class="group_input__help"></p>
					                	</div>
					                </div>
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Image:</label>
											<p class="group_input__help group_input__image"><img src='{{asset($DB_table->image)}}' id="i_image-show" alt="No image select"/></p>
				                			<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Gender:</label>
					                		@if($DB_table->gender == 1)
												<input type="text" id='gender_true' class="group_input__item" name="gender" disabled="disabled" value="Male"/>
											@else 
												<input type="text" id='gender_true' disabled="disabled" class="group_input__item" name="gender" value="Female"/>
											@endif
				                			<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea name="description"  disabled="disabled" id="i_description" class="group_input__text" placeholder="Something here">{{$DB_table->description}}</textarea>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Published:</label>
					                		@if($DB_table->published == 1)
												<input type="text" id='gender_true' class="group_input__item" name="gender" disabled="disabled" value="Yes"/>
						                	@else 
												<input type="text" id='gender_true' class="group_input__item" name="gender" disabled="disabled" value="No"/>
					                		@endif											
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