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
	                <form action="{{$DB_table->id}}" method="post" enctype="multipart/form-data" id='form_Insert'>	                	
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	                	<div class="form_group">
		                	<div class='form_group--inner clearfix'>
		                		<div class="flex_col">
			                		<div class="group__item">
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Customer Name:</label>
											<input type="text" disabled="disabled"  class="group_input__item" id="" name="" placeholder="Auto" value="{{$DB_table->m_customers->name}}" />
											<p class="group_input__help"></p>
					                	</div>
			                			<div class='group_input'>
					                		<label class="group_input__title required" for="">Address:</label>
											<input type="text"  class="group_input__item" id="i_address" name="address" placeholder="Address" value="{{$DB_table->address}}" />
											<p class="group_input__help"></p>
					                	</div>
			                		</div>	        			
		                		</div>
		                		<div class="flex_col">
		                			<div class="group__item">
					                	<div class='group_input'>
					                		<label class="group_input__title" for="">Ordering:</label>
											<input type="number" id="i_ordering" class="group_input__item" name="ordering"  value="{{$DB_table->ordering}}" />
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
									</div>
		                		</div>
		                	</div>
	                	</div>
	                	<p class="group_input__submit"><input type="submit" name="submit" value="Update"></p>
	                	<p class="group_input__submit"><a href="{{route('NRGCAddresses_getDetail',['id'=>$DB_table->customers_id])}}">Back</a></p>
	                </form>
	            </div>
	        </div>
	        
	    </div>
	@endsection
{{-- end content --}}