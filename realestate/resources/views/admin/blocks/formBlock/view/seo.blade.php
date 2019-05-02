<div class='group_input'>
	<label class="group_input__title" for="seo_title">SEO Title:</label>
	<input disabled='disabled'  type="text"  class="group_input__item" name="seo_title" id="i_seo_title" placeholder="Title" value="{{$DB_table->seo_title}}"/>
	<p class="group_input__help"></p>
</div>
<div class='group_input'>
	<label class="group_input__title" for="seo_keyword">SEO Keyword:</label>
	<input disabled='disabled' type="text"  class="group_input__item" name="seo_keyword" id="i_seo_keyword" placeholder="Keyword" value="{{$DB_table->seo_keyword}}"/>
	<p class="group_input__help"></p>
</div>
<div class='group_input'>
	<label class="group_input__title" for="i_seo_description">SEO Description:</label>
	<textarea disabled='disabled' name="seo_description" class="group_input__text" id="i_seo_description" placeholder="Something here">{{$DB_table->seo_description}}</textarea>
	<p class="group_input__help"></p>
</div>