<div class="container slide">
    <div id="owl__header" class="owl-carousel owl-theme">
        @foreach($DBSlides_categories as $Slides_categories_item)
            @foreach($Slides_categories_item->m_slides as $slides_item)
                @if($slides_item->published == 0)
                    @continue
                @endif
                <div class="item">
                    <img src="{{asset($slides_item->image)}}" class="img-fluid" alt="{{$slides_item->name}}">
                    <div class="item__content">
                        <h2>{{$slides_item->name}}</h2>
                        <p>{{$slides_item->Summary}}</p>
                        <span><a href="{{$slides_item->url}}" title="{{$slides_item->name}}">SHOP NOW</a></span>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
