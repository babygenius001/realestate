<div class='group_input clearfix'>
	<label class="group_input__title" for="">show in homepage:</label>
	@if($DB_table->show_in_homepage == 1)
		<input disabled='disabled' type="text" class="group_input__item" value="Yes"/>
	@else
		<input disabled='disabled' type="text" class="group_input__item" value="No"/>
	@endif
	<p class="group_input__help"></p>
</div>