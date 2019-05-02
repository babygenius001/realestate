@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
	
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{route('NRPDashPostersImages_postNew',['id'=>$id])}}" method="post" enctype="multipart/form-data">
		<div class="form_group">
			{{ csrf_field() }}
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/ordering')
            		</div>	     
            		<div class='group_input'>
						<label class="group_input__title" for="i_image">Image:</label>
						<input type="file"  class="group_input__item" id="i_image" name="image[]" multiple max="20"/>
						<p class="group_input__help group_input__image"><img src='{{asset('images/noimages.jpg')}}' id="i_image-show" alt="No image select"/></p>
					</div>
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	    <p class="group_input__submit"><a class="bg-red" href="{{route('NRGDashPostersImages',['id'=>$id])}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
	
@endsection