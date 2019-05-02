<div class='group_input'>
	<label class="group_input__title" for="">Hot:</label>
	@if($DB_table->is_hot == 1)
		<input type="radio" id='is_hot_true' class="group_input__item" checked="checked" name="is_hot" value="1"/>
		<label for="is_hot_true">Yes</label>
		<input type="radio" id='is_hot_false' class="group_input__item" name="is_hot" value="0"/>
		<label for="is_hot_false">No</label>
	@else
		<input type="radio" id='is_hot_true' class="group_input__item" name="is_hot" value="1"/>
		<label for="is_hot_true">Yes</label>
		<input type="radio" id='is_hot_false' class="group_input__item"  checked="checked" name="is_hot" value="0"/>
		<label for="is_hot_false">No</label>
	@endif
	
	<p class="group_input__help"></p>
</div>