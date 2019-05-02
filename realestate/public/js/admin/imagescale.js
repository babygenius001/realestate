
$(document).ready(function(){
	$('.i_image-show').click(function(){
		$('.img_zoomscare').slideUp();
		$('.group_input__image>img').removeClass('i_image_scale');
		$(this).addClass('i_image_scale');
		var images = $('.i_image_scale').attr('src'); 
		$('.img_zoomscare img').attr('src',images);
		$('.img_zoomscare').slideDown();
	});

	$('.img_zoomscare').click(function(){
		$('.img_zoomscare').slideUp();
		$('.group_input__image>img').removeClass('i_image_scale');
	});
});
