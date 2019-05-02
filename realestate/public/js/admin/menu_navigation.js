$(document).ready(function(){
	menu_Lv1_toggle();
});


function menu_Lv1_toggle(){
	$('#main-menu>.MLevel_1').click(function(){
		if($(this).hasClass('LV1_active')){
			$(this).removeClass('LV1_active');
			$(this).children('.MLevel_2').slideUp();
		}
		else {
			$('.MLevel_2').slideUp();
			$(this).children('.MLevel_2').slideDown();
			$('#main-menu>.MLevel_1').removeClass('LV1_active');
			$(this).addClass('LV1_active');
		}

	});
}