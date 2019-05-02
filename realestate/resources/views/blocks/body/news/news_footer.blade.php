<div class="container news__footer">
	<div class="news__footer--inner container__wrapper">
		<div class="title">Breaking News</div>
		<div id="owl__news" class="owl-carousel owl-theme">
	        @foreach($news as $news_item)
                <div class="item news__footer__item">
					<img class="news__footer__image lazyload" data-src="{{asset($news_item->image)}}" alt="">
                    <a href="{{route('NRGNews_detail',['alias'=>$news_item->alias,'id'=>$news_item->id]) }}" class="news__footer__title" title="{{$news_item->name}}">{{str_limit($news_item->name,25)}}</a>
                    <p class="news__footer__time"><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg svg__clock"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z" class=""></path></svg>{{$news_item->new_related}}</p>
                    <p class="news__footer__summary">{{str_limit($news_item->summary,75)}}</p> 

                </div>
	        @endforeach
	    </div>
	</div>
</div>

