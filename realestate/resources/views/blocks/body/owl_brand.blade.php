<div class="container news__footer">
	<div class="news__footer--inner container__wrapper">
		<div id="owl__brand" class="owl-carousel owl-theme">
	        @foreach($Products_brands as $news_item)
                <div class="item news__footer__item">
                    <a href="{{$news_item->id}}" title="{{$news_item->name}}"><img class="news__footer__image lazyload" data-src="{{asset($news_item->image)}}" alt=""></a>
                </div>
	        @endforeach
	    </div>
	</div>
</div>

