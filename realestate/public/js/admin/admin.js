 
 $(document).ready(function(){
 	$('#rowsTable').change(function(){
   	 	var rowsTable = $('#rowsTable').val();
 		ShowRowsTable(rowsTable);
 	});
	$("#i_image").change(function(){
		var str = $(this).val(); 
		$('#i_image-show').attr('src',str)
	});

 	$('#i_getColour').change(function(){
		var hex = $(this).val(); 
		$('#i_hex_colour').val(hex);
 	})

 	$('#i_hex_colour').keyup(function(){
		var hex = $(this).val(); 
		$('#i_getColour').val(hex);
 	})
});

 function ShowRowsTable(value) {
 	var link = $(location).attr('href');
    var loca = link.indexOf("list") + 4;
    var newLink = link.slice(0,loca) + '/' + value;
   	window.location=newLink;
}

