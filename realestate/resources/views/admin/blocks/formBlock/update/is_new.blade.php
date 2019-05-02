<div class='group_input'>
	<label class="group_input__title" for="">New:</label>
	

	@if($DB_table->is_new == 1)
		<input type="radio" id='is_new_true' class="group_input__item" checked="checked" name="is_new" value="1"/>
		<label for="is_new_true">Yes</label>
		<input type="radio" id='is_new_false' class="group_input__item" name="is_new" value="0"/>
		<label for="is_new_false">No</label>
	@else
		<input type="radio" id='is_new_true' class="group_input__item" name="is_new" value="1"/>
		<label for="is_new_true">Yes</label>
		<input type="radio" id='is_new_false' class="group_input__item" checked="checked" name="is_new" value="0"/>
		<label for="is_new_false">No</label>
	@endif

	<p class="group_input__help"></p>
</div>