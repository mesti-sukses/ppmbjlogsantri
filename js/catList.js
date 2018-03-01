$(document).ready(function(){
	$(".btn-edit-menu").on("click", function(){
		var cat = $(this).data("name");
		var id = $(this).data("id");
		$('#name').attr('value', cat);
		$('#id').attr('value', id);
	});
});