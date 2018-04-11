$(document).ready(function(){
	$("#attendenceDetailedTable tbody").on("click", ".btn-status", function(){
		var level = $(this).data("level");
		var santri_id = $(this).data("santri");
		$(".status-check").each(function(){
			$(this).prop('checked', false);
		});
		$("#id").attr('value', santri_id);
		//$("#user-level").text(level);
		if((level & 1) == 1) $("#wali").prop('checked', true);
		if((level & 2) == 2) $("#reguler").prop('checked', true);
		if((level & 4) == 4) $("#jurnal").prop('checked', true);
		if((level & 8) == 8) $("#pasus").prop('checked', true);
		if((level & 16) == 16) $("#kesiswaan").prop('checked', true);
		if((level & 32) == 32) $("#koordinator").prop('checked', true);
		if((level & 32) == 32) $("#admin").prop('checked', true);
		if((level & 128) == 128) $("#ustadzah").prop('checked', true);
		if((level & 256) == 256) $("#hadist").prop('checked', true);
		if((level & 512) == 512) $("#saringan").prop('checked', true);
	});
});