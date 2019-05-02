<div class='group_input'>
	<label class="group_input__title" for="">Published:</label>
	@if($DB_table->published == 1)
		<input type="radio" id='pubslished_true' class="group_input__item" checked="checked" name="published" value="1"/>
		<label for="pubslished_true">Yes</label>
		<input type="radio" id='pubslished_false' class="group_input__item" name="published" value="0"/>
		<label for="pubslished_false">No</label>
	@else
		<input type="radio" id='pubslished_true' class="group_input__item" name="published" value="1"/>
		<label for="pubslished_true">Yes</label>
		<input type="radio" id='pubslished_false' class="group_input__item" checked="checked" name="published" value="0"/>
		<label for="pubslished_false">No</label>
	@endif
	<p class="group_input__help"></p>
</div>