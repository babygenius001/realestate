@extends('template/template')

@section('y_css_area')
    <link rel="stylesheet" type="text/css" href="{{asset('css/product_image.css')}}">
@endsection

@section('y_js_area')

@endsection

@section('y_content')

		<div class="container">
			<div class="container__wrapper">
			<div class="title">{{$title}}</div>
				<div class="DFlex" id="product">
					<div id="product_images">
						<div class="product_images--inner">
						  	<div class="mySlides">
						      	<img src="{{asset($getProductsImages[0]->image)}}" style="width:100%">
						  	</div>
							<div class="caption-container">
								<p id="caption">{{$getProducts->name}}</p>
							</div>
							<div class="row">
								<?php $i = 0; ?>
								@foreach($getProductsImages as $productsImage_item)
									<div class="column">
										<img class="demo cursor" src="{{asset($productsImage_item->image)}}" style="width:100%">
									</div>
								@endforeach
							</div>
								

							</div>
					</div>
					<div id="product_info">
						<div class="product_info--inner">
							<div class="title">{{$getProducts->name}}</div>
							<div class="product-box">
								<p><span class="mini_title">Height:</span>{{$getProducts->height}}</p>
								<p><span class="mini_title">Width:</span>{{$getProducts->width}}</p>
								<p><span class="mini_title">Depth:</span>{{$getProducts->depth}}</p>
								<p><span class="mini_title">Weight:</span>{{$getProducts->weight}}</p>
							</div>
							<div class="product-box">
								<p style="text-align: center;"><span class="mini_title" >Model:</span>{{$getProductsModel->name}}</p>
								<p><span class="mini_title">Manufactories:</span>{{$getProductsModel->manufactories}}</p>
								<p><span class="mini_title">Quality:</span>{{$getProductsModel->quality}}</p>
								<p><span class="mini_title">Storage:</span>{{$getProductsModel->storage}}</p>
								<p><span class="mini_title">Max buying:</span>{{$getProductsModel->max_buying}}</p>
								<p><span class="mini_title">Description:</span>{{$getProductsModel->description}}</p>
								<p><span class="mini_title">Price:</span><span class="mini_price">{{number_format($getProductsModel->price, 2, ',', '.' ) . " VNĐ"}}</span></p>
							</div>
							<div class="product-box">
								<p  class="mini_check mini_checked" style="background-color: {{$getProductsModel->m_products_colours->hex_colour}}">{{$getProductsModel->name}} <span>&#10003; - Selected</span></p>
								@if(count($getProductsNeighborhood)>0) 
									@foreach($getProductsNeighborhood as $item)
										<p class="mini_check" style="background-color: {{$item->m_products_colours->hex_colour}}"><a href="{{route('NRGProduct_getDetail',['alias'=>$item->alias,'id'=>$item->id])}}">{{$item->name}}</a></p>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
				<div class="title">{{$getProductsPosters->title}}</div>	
				<div class="DFlex" id="products_posts">
					<div class="products_posts_content">
						{!!$getProductsPosters->content!!}
					</div>
				</div>
			</div>
		</div>
        
        @include('blocks/body/news/news_footer')

@endsection


@section('y_js_area_end')
	<script>
		$(document).ready(function() {
			$(".cursor").click(function() {
  				var images = $(this).attr('src');
  				$(".mySlides img").attr('src',images);
			});
			$(".products_posts_content p").shorten({
			    "showChars" : 1500,
			    "moreText"  : "More",
			    "lessText"  : "Hidden",
			});
        });

		function showSlides(n) {
			
		}
	</script>

    <script type="text/javascript"  src="{{asset('libraries/jquery.shorten.1.0.js')}}"></script>
@endsection