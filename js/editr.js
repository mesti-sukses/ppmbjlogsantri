$(document).ready(function(){
	$('#div-editor').summernote({
		airMode: true
	});
	$('#editor').on('submit', function(){
		var t = $('#div-editor').summernote('code');
		$('#text-editor').val(t);
	})
});