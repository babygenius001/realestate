@extends('template/dashboard')

@section('y_dashboard_css_area')

@endsection

@section('y_dashboard_js_area')
@endsection

@section('y_dashboard_content')
	<form id="formData" action="{{route('NRPDashPostersDetail_postUpdate',['id'=>$DB_table->id])}}" method="post" enctype="multipart/form-data">
		<div class="form_group">
			{{ csrf_field() }}
			<div class="form_group--inner">
				<div class="flex_col">
            		<div class="group__item">
            			@include('admin/blocks/formBlock/update/name')
                        @include('admin/blocks/formBlock/update/alias')
            		</div>	          
                    <div class="group__item">
                        <div class='group_input'>
                            <label class="group_input__title" for="">Products posters: {{$DB_table->m_products_posters->name}}</label>
                        </div>
                        <div class='group_input'>
                            <img src="{{asset($DB_table->m_products_posters->image)}}" alt="">
                        </div>
                    </div> 
                        
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/update/ordering')
                    </div>
                    <div class="group__item">
                        <div class='group_input'>
                            <label class="group_input__title" for="id_products_colours_id">Products colours:</label>
                            <select name="products_colours_id" class="group_input__item" id="id_products_colours_id">
                                <option selected="selected" value="{{$DB_table->m_products_colours->id}}" style="background-color: {{$DB_table->m_products_colours->hex_colour}}"> 
                                    {{$DB_table->m_products_colours->name}}
                                </option>
                                @foreach($craw_products_colours as $products_colours_items)
                                    <option value="{{$products_colours_items->id}}" style="background-color: {{$products_colours_items->hex_colour}}"> 
                                        {{$products_colours_items->name}}
                                    </option>
                                @endforeach
                            </select>
                            <p class="group_input__help"></p>
                        </div>
                        @include('admin/blocks/formBlock/update/quality')
                        @include('admin/blocks/formBlock/update/storage')
                        @include('admin/blocks/formBlock/update/price')
                        @include('admin/blocks/formBlock/update/max_buying')
                        @include('admin/blocks/formBlock/update/manufactories')
        			</div>
        				 
        		</div>
        		<div class="flex_col">
        			<div class="group__item">
            			@include('admin/blocks/formBlock/update/seo')
            		</div>
        		</div>
        		<div class="flex_col">
        			<div class="group_item">
            			@include('admin/blocks/formBlock/update/description_short')
            			@include('admin/blocks/formBlock/update/description')
        			</div>
        		</div>
			</div>
		</div>
		<p class="group_input__submit"><input type="submit" name="submit" value="update"></p>
        <p class="group_input__submit"><a class="bg-red" href="
            {{route('NRPDashPostersDetail_unpublish',['id'=>$DB_table->id])}}">Delete</a></p>
	    <p class="group_input__submit"><a class="bg-red" href="
	    	{{route('NRGDashPosters')}}">Back</a></p>
	</form>	
@endsection

@section('y_dashboard_js_area_end')
@endsection