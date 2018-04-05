$(document).ready(function(){
	$(".btn-edit-menu").on("click", function(){
		var cat = $(this).data("name");
		var id = $(this).data("id");
		$('#name').attr('value', cat);
		$('#id').attr('value', id);
	});

	$(".btn-edit-config").on("click", function(){
		var cat = $(this).data("key");
		var id = $(this).data("id");
		var val = $(this).data("val");
		$('#key').attr('value', cat);
		$('#id').attr('value', id);
		$('#value').attr('value', val);
	});
});