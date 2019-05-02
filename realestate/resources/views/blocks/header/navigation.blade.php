<div class="container__wrapper">
	<ul class="menu_lv_0">
		<li class="item_lv_0">
			<a class="title_lv_0" href="{{route('NRGHome')}}">Home</a>
			<!-- end div.menu_lv_1-->
		</li>
		<!-- end li.level_0 -->
		<li class="item_lv_0">
			<a class="title_lv_0" href="{{route('NRGNews')}}">News</a>
			<div class="menu_lv_1">
				<div class='container__wrapper'>
					<div class='menu_lv_1--wrap'>
						@foreach($DBMenu_news_categories as $news_categories_item)
							<div class="item_lv_1">
								<a href="{{route('NRGNews_getCates',['alias'=>$news_categories_item->alias,'id'=>$news_categories_item->id])}}" class="title_lv_1"> {{$news_categories_item->name}} </a>
									{{getNewsCategoriesMenu($news_categories_item->id,$news_categories_item->parent_id)}}
							<!-- end div.menu_lv_2-->
							</div>
						@endforeach
						<!-- end div.item_lv_1-->
					</div>
					<!-- end div.menu_lv_1--wrap-->
				</div>
				<!-- end div.container__wrapper-->
			</div>
			<!-- end div.menu_lv_1-->
		</li>
		<li class="item_lv_0">
			<a class="title_lv_0" href="javascrip:void(0)">Category</a>
			<div class="menu_lv_1">
				<div class='container__wrapper'>
					<div class='menu_lv_1--wrap'>
						@foreach($DBMenu_products_categories as $products_categories_item)
							<div class="item_lv_1">
								<a href="" class="title_lv_1"> {{$products_categories_item->name}}</a>
								@foreach($products_categories_item->m_products_types as $products_types_item)
								<div class='menu_lv_2'>
									<div class='item_lv_2'>
										<a href='{{$products_types_item->id}}'>{{$products_types_item->name}}</a>
									</div>
								</div>
								@endforeach
							<!-- end div.menu_lv_2-->
							</div>
						@endforeach
						<!-- end div.item_lv_1-->
					</div>
					<!-- end div.menu_lv_1--wrap-->
				</div>
				<!-- end div.container__wrapper-->
			</div>
			<!-- end div.menu_lv_1-->
		</li>
		<!-- end li.level_0 -->
		<li class="item_lv_0">
			<a class="title_lv_0" href="javascrip:void(0)">Store</a>
			<div class="menu_lv_1">
				<div class='container__wrapper'>
					<div class='menu_lv_1--wrap'>
						<div class="item_lv_1">
							<a href="" class="title_lv_1"> lv1 </a>
							<div class="menu_lv_2">
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
							</div>
						<!-- end div.menu_lv_2-->
						</div>
						<!-- end div.item_lv_1-->
					</div>
					<!-- end div.menu_lv_1--wrap-->
				</div>
				<!-- end div.container__wrapper-->
			</div>
			<!-- end div.menu_lv_1-->
		</li>
		<!-- end li.level_0 -->
		<li class="item_lv_0">
			<a class="title_lv_0" href="javascrip:void(0)">Classified advertisement</a>
			<div class="menu_lv_1">
				<div class='container__wrapper'>
					<div class='menu_lv_1--wrap'>
						<div class="item_lv_1">
							<a href="" class="title_lv_1"> lv1 </a>
							<div class="menu_lv_2">
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
							</div>
						<!-- end div.menu_lv_2-->
						</div>
						<!-- end div.item_lv_1-->
					</div>
					<!-- end div.menu_lv_1--wrap-->
				</div>
				<!-- end div.container__wrapper-->
			</div>
			<!-- end div.menu_lv_1-->
		</li>
		<!-- end li.level_0 -->
		<li class="item_lv_0">
			<a class="title_lv_0" href="javascrip:void(0)">Rating</a>
			<div class="menu_lv_1">
				<div class='container__wrapper'>
					<div class='menu_lv_1--wrap'>
						<div class="item_lv_1">
							<a href="" class="title_lv_1"> lv1 </a>
							<div class="menu_lv_2">
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
								<div class="item_lv_2"><a href="">item lv2</a></div>
							</div>
						<!-- end div.menu_lv_2-->
						</div>
						<!-- end div.item_lv_1-->
					</div>
					<!-- end div.menu_lv_1--wrap-->
				</div>
				<!-- end div.container__wrapper-->
			</div>
			<!-- end div.menu_lv_1-->
		</li>
		<!-- end li.level_0 -->
	</ul>
	<div class="clearfix"></div>
</div>