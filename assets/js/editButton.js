$(document).ready(function(){
	$(".btn-edit-menu").on("click", function(){
		var type = $(this).data("linktype");
		var icon = $(this).data("icon");
		var txt = $(this).data("text");
		var link = $(this).data("link");
		var menu_id = $(this).data('id');
		var loc = $(this).data('loc');
		$('#icon').attr('value', icon);
		$('#text').attr('value', txt);
		$('#link').attr('value', link);
		$('#type').attr('value', type);
		$('#id').attr('value', menu_id);
		$('#location').attr('value', loc);
	});
});