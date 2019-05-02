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
	                <form action="{{route('NRGCCustomers_postRegister')}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
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
					                		<label class="group_input__title" for="">Email:</label>
											<input type="email"  class="group_input__item" id="i_email" name="email" placeholder="Email"/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Password:</label>
											<input type="password"  class="group_input__item" id="i_password" name="password" placeholder="Password"/>
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Confirm password:</label>
											<input type="password"  class="group_input__item" id="i_confirmed" name="confirmed" placeholder="Password"/>
											<p class="group_input__help"></p>
					                	</div>
					                </div>
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
			                			<div class='group_input'>
					                		<label class="group_input__title" for="">Tel:</label>
											<input type="text"  class="group_input__item" id="i_tel" name="tel" placeholder="Tel"/>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class="group_input">
					                		<label class="group_input__title" for="">Date of birth</label>
											<input type="date" class="group_input__item" id="i_date_of_birth" name="date_of_birth" placeholder="date" value="2019-04-15">
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input clearfix'>
					                		<label class="group_input__title" for="">Gender:</label>
											<input type="radio" id='gender_true' class="group_input__item" checked="checked" name="gender" value="1"/>
					                		<label for="gender_true">Male</label>
											<input type="radio" id='gender_false' class="group_input__item" name="gender" value="0"/>
					                		<label for="gender_false">Female</label>
											<p class="group_input__help"></p>
					                	</div>
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Description:</label>
											<textarea name="description" id="i_description" class="group_input__text" placeholder="Something here"></textarea>
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