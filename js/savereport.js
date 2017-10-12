$(document).ready(function(){
	var myData = {};
	$('.kosong').each(function(){
		var key = $(this).data('id');
		var value = $(this).data('kosong');

		myData[key] = value;
	});

	$('.save').click(function(e){
		e.preventDefault();
			var target = $(this).attr('href');

	    $.post(
	    	target,
	  		myData,
	  		function(data){
	  			console.log(myData);
	  		}
	    );
	});

	$('.inlinebar').sparkline('html', {type: 'bar', barColor: 'red'} );

	$('#list-santri').DataTable();
});