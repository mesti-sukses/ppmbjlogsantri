$(document).ready(function(){
	$("input[type=checkbox]").change(function(){
		var a = $("input[type=checkbox]:checked").length;
		$('.kosong').text(parseInt($('#target').val()) - a);
	});

	$('.submit').click(function(){
		$('#kosong').val($('.kosong').text());
	});
})