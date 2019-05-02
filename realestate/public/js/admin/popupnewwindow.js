$(document).ready(function() {
	$('.popup').click(function(event) {
		var link = $("#i_get_image").val();
	    window.open(link, "image", "width=400,height=400,scrollbars=yes");
	 });
})