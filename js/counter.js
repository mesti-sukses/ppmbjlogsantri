$(document).ready(function(){
	$("input[type=checkbox]").change(function(){
		var a = $("input[type=checkbox]:checked").length;
		$('.kosong').text(a);
	});

	$('.submit').click(function(){
		$('#kosong').val($('.kosong').text());
	});

	$(".switch-1 input[type=checkbox]").change(function(){
		var a = $(".switch-1 input[type=checkbox]:checked").length;
		$('.kosong-1').text(a);
	});

	$('.submit').click(function(){
		$('#kosong-1').val($('.kosong-1').text());
	});

	$(".switch-2 input[type=checkbox]").change(function(){
		var a = $(".switch-2 input[type=checkbox]:checked").length;
		$('.kosong-2').text(a);
	});

	$('.submit').click(function(){
		$('#kosong-2').val($('.kosong-2').text());
	});
})