{!!"<h1>$title</h1>"!!}
@foreach($DB_table as $items)

<div display='block'>
	<p><img style="max-width: 100px; max-height: 100px;" src='{{asset($items->image)}}' alt=''></p>
	<p>{{asset($items->image)}}</p>
</div>


@endforeach