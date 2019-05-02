

$(document).ready(function(){

	$("#i_name").keyup(function(){
		var str = $(this).val(); 
		str = str.toLowerCase();
	    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
	    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
	    str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
	    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
	    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
	    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
	    str = str.replace(/đ/g, 'd');
	    str = str.replace(/\W+/g, ' ');
	    str = str.replace(/\s/g, '-');
		$('#i_alias').val(str);
	});

});
	// text_create=textreplace(/à|á|ã|A|A|A|A|A|A|A|A|A|A|A|A/g,"a").replace(/\/g,'-').replace(/dd/g,"d").replace(/dd/g,"d").replace(/Y|reviews|Y|Y|Y/g,"y").replace(/with|||||from|||w/g,"u")replace(/showmethedataset)withthedataset||/g,"o").replace(/e|e|e|e|e|e|e|e|e|e|e.+/g,"e").replace(/i|ie|ies|g/g,"i");
	// 	$('#i_alias').(text_create);}).keyup();