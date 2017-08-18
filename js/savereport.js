$(document).ready(function(){
	var myData = {};
	$('.presentasi').each(function(){
		var key = $(this).data('id');
		var valu = $(this).text();

		myData[key] = valu;
	});

	$('.save').click(function(e){
		e.preventDefault();
			var target = $(this).attr('href');

	    $.post(
	    	target,
	  		myData,
	  		function(data){
	  			alert(data);
	  		}
	    );
	});
});