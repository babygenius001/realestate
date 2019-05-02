@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{route('NRPDashPostersDetail_postNew',['id'=>$get_products_posters->id])}}" method="post" enctype="multipart/form-data">
		<div class="form_group">
			{{ csrf_field() }}
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/insert/name')
                        @include('admin/blocks/formBlock/insert/alias')
            		</div>	          
                    <div class="group__item">
                        <div class='group_input'>
                            <label class="group_input__title" for="">Products posters: {{$get_products_posters->name}}</label>
                        </div>
                        <div class='group_input'>
                            <img src="{{asset($get_products_posters->image)}}" alt="">
                        </div>
                    </div> 
                        
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/ordering')
                    </div>
                    <div class="group__item">
                        <div class='group_input'>
                            <label class="group_input__title" for="id_products_colours_id">Products colours:</label>
                            <select name="products_colours_id" class="group_input__item" id="id_products_colours_id">
                                @foreach($craw_products_colours as $products_colours_items)
                                    <option value="{{$products_colours_items->id}}" style="background-color: {{$products_colours_items->hex_colour}}"> 
                                        {{$products_colours_items->name}}
                                    </option>
                                @endforeach
                            </select>
                            <p class="group_input__help"></p>
                        </div>
                        @include('admin/blocks/formBlock/insert/quality')
                        @include('admin/blocks/formBlock/insert/storage')
                        @include('admin/blocks/formBlock/insert/price')
                        @include('admin/blocks/formBlock/insert/max_buying')
                        @include('admin/blocks/formBlock/insert/manufactories')
        			</div>
        				 
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/insert/seo')
            		</div>
        		</div>
        		<div class="flex_col">
        			<div class="group_item">
            			@include('admin/blocks/formBlock/insert/description_short')
            			@include('admin/blocks/formBlock/insert/description')
        			</div>
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="Create"></p>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashPosters')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
@endsection