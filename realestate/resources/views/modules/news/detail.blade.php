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
				<div class="title">News {{$title}}</div>
			</div>
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
				<div class="bodynews_hot" id="news">
					<div class="news_path">{{$link}}</div>
					<p class="news_title">{{$get_news->title}}</p>
					<p class="news_time_creator"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg svg__clock"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path></svg>{{$get_news->new_related}} by <span class="news_creator">{{$get_news->creator}}</span></p>
					<p class="news_summary">{{$get_news->summary}}</p>
					<p class="news_image"><img src="{{asset($get_news->image)}}" alt="{{$get_news->name}}"></p>
					<div class="news_content">
						{!!$get_news->content!!}
					</div>
					<p class="news_source_website">
						Source: <a href="{!!$get_news->source_website!!}">{!!$get_news->source_website!!}</a>
					</p>
				</div>
			</div>
		</div>
        @include('blocks/body/news/news_footer')

@endsection


@section('y_js_area_end')
	<script>
		// $(document).ready(function() {
		// 	var height = $(".newsItems_image").width();
		// 	height = (height / 3) * 2.5;
		// 	$(".newsItems_image").css("height",height);	
		// });
	</script>
@endsection