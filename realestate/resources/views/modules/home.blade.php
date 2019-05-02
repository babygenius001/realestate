@extends('template/template')

@section('y_css_area')

@endsection

@section('y_js_area')

@endsection

@section('y_content')
        @include('blocks/body/banner/main_left')
        @include('blocks/body/owl_brand')

		<div class="container">
			<div class="container__wrapper">
			<div class="title">Classified Advertisement</div>
				<div class="home_1 DFlex ">
					<div class="mini_cate">
						<div class="mini_cate--inner">
							<a href="javascript:void(0)">Category</a>
							@foreach($Products_categories as $item)
								<a href="{{$item->id}}">{{$item->name}}</a>
							@endforeach
						</div>
					</div>
					<div class="mini_post">
			        	<div class="mini_post--inner">
				        	@foreach($Products_posters_details as $item) 
								<div class="mini_post__item">
									<a href="{{route('NRGProduct_getDetail',['alias'=>$item->alias,'id'=>$item->id])}}"><img class="lazyload" title="{{$item->m_products_posters->name . ' ' . $item->name}}" data-src="{{$item->m_products_posters->image}}" alt="{{$item->name}}"><span class="mini_post__name">{{str_limit($item->m_products_posters->name . ' ' . $item->name,25)}}</span><span class="mini_post__price">{{number_format($item->price, 2, ',', '.') . " VND"}} </span></a>
								</div>
				        	@endforeach	
			        	</div>
			        </div>	
				</div>
			</div>
		</div>
        
        @include('blocks/body/news/news_footer')

@endsection


@section('y_js_area_end')
	<script>
		$(document).ready(function() {
			$(".mini_post__item img").css("height",$(".mini_post__item").width());;	
		});
	</script>
@endsection