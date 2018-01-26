$('.slider').on('input', function(){

	var id = $(this).attr('id');
	document.getElementById(id).innerHTML = this.value;
	
	
});