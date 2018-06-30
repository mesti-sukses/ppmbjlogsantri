$(document).ready(function(){
	$('#div-editor').summernote();
	$('#editor').on('submit', function(){
		var t = $('#div-editor').summernote('code');
		$('#text-editor').val(t);
	})
});