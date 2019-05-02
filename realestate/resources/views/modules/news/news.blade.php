@extends('template/template')

@section('y_css_area')
    <link rel="stylesheet" type="text/css" href="{{asset('css/news.css')}}">
@endsection

@section('y_js_area')

@endsection

@section('y_content')
        @include('blocks/body/owl_brand')
		
		<div class="container">
			<div class="container__wrapper">
				<div class="title">{{$title}}</div>
			</div>
			@if($bodyNews_list->isEmpty())
				<div class="container__wrapper">
					<h2>No news: {{$title}}</h2>
				</div> 
			@else
				@if(count($bodyNews_list)>=3)
					<div class="container__wrapper bodyNews">
						<div class="bodyNews_latest">
							<div class="title">Latest News</div>
							<div class="DFlex bodyNews_latest--inner">
								@foreach($bodyNews as $newsItems)
									<div class="newsItems">
										<div class="newsItems_image">
											<img class="lazyload" data-src="{{asset($newsItems->image)}}" alt="{{$newsItems->name}}">
										</div>
										<div class="newsItems_content">
											<a href="{{route('NRGNews_detail',['alias'=>$newsItems->alias,'id'=>$newsItems->id])}}" class="news__footer__title" title="{{$newsItems->name}}">{{str_limit($newsItems->name,75)}}</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						<div class="bodynews_hot">
							<div class="DFlex bodynews_hot--inner">
								<div class="bodynews_hot__main">
									<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[0]->alias,'id'=>$bodynews_hot[0]->id])}}"><img class="lazyload" data-src="{{asset($bodynews_hot[0]->image)}}" alt=""></a>
									<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[0]->alias,'id'=>$bodynews_hot[0]->id])}}">{{$bodynews_hot[0]->name}}</a>
									<p>{{str_limit($bodynews_hot[0]->summary,250)}}</p>

								</div>
								<div class="bodynews_hot__neighborhood">
									<div class="neighborhood_item">
										<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[1]->alias,'id'=>$bodynews_hot[1]->id])}}"><img class="lazyload" data-src="{{asset($bodynews_hot[1]->image)}}" alt=""></a>
										<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[1]->alias,'id'=>$bodynews_hot[1]->id])}}">{{$bodynews_hot[1]->name}}</a>
									</div>
									<div class="neighborhood_item">
										<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[2]->alias,'id'=>$bodynews_hot[2]->id])}}"><img class="lazyload" data-src="{{asset($bodynews_hot[2]->image)}}" alt=""></a>
										<a href="{{route('NRGNews_detail',['alias'=>$bodynews_hot[2]->alias,'id'=>$bodynews_hot[2]->id])}}">{{$bodynews_hot[2]->name}}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
				<div class="container__wrapper bodyNews_list">
					<div class="title">News {{$title}}</div>
					<div class="DFlex bodyNews_list--inner">
						@foreach($bodyNews_list as $list_item)
							<div class="list_item">
								<div class="list_item_image">
									<img class="lazyload" data-src="{{asset($list_item->image)}}" alt="{{$list_item->name}}">
								</div>
								<div class="list_item_content">
									<a href="{{route('NRGNews_detail',['alias'=>$list_item->alias,'id'=>$list_item->id]) }}" class="list_item__title" title="{{$list_item->name}}">{{str_limit($list_item->name,75)}}</a>
				                    <p class="list_item__time"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg svg__clock"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path></svg>{{$list_item->new_related}}</p>
									<p>{{str_limit($list_item->summary,250)}}</p>
								</div>
							</div>
						@endforeach
					</div>
					<div class='panel-pagination'>
						<ul class="pagination">
							{!!$bodyNews_list->render()!!}
						</ul>
					</div>
				</div>
			@endif
		</div>
        @include('blocks/body/news/news_footer')

@endsection


@section('y_js_area_end')
	<script>
		$(document).ready(function() {
			var height = $(".newsItems_image").width();
			height = (height / 3) * 2.5;
			$(".newsItems_image").css("height",height);	
		});
	</script>
@endsection