<div class='group_input clearfix'>
	<label class="group_input__title" for="">show in homepage:</label>
	@if($DB_table->show_in_homepage == 1)
		<input type="radio" id='show_in_homepage_true' class="group_input__item" checked="checked" name="show_in_homepage" value="1"/>
		<label for="show_in_homepage_true">Yes</label>
		<input type="radio" id='show_in_homepage_false' class="group_input__item" name="show_in_homepage" value="0"/>
		<label for="show_in_homepage_false">No</label>
	@else
		<input type="radio" id='show_in_homepage_true' class="group_input__item" name="show_in_homepage" value="1"/>
		<label for="show_in_homepage_true">Yes</label>
		<input type="radio" id='show_in_homepage_false' class="group_input__item" checked="checked" name="show_in_homepage" value="0"/>
		<label for="show_in_homepage_false">No</label>
	@endif
	<p class="group_input__help"></p>
</div>