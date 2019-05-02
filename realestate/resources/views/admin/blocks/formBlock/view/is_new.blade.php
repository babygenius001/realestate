<div class='group_input'>
	<label class="group_input__title" for="">New:</label>
	@if($DB_table->is_new == 1)
		<input disabled='disabled' type="text" class="group_input__item" value="Yes"/>
	@else
		<input disabled='disabled' type="text" class="group_input__item" value="No"/>
	@endif
	<p class="group_input__help"></p>
</div>