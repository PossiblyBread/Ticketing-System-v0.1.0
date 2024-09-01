// conect to department.php
$(document).ready(function() {        
	
	var slaData = $('#listSla').DataTable({
		"searching": false,
		"lengthChange": false,
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			url: "sla_action.php",
			type: "POST",
			data: { action: 'listSla' },
			dataType: "json"
		},
		"columnDefs": [
			{
				"targets": [0, 3, 4],
				"orderable": false,
			},
		],
		"pageLength": 10
	});	

	$(document).on('click', '.update', function(){
		var slaId = $(this).attr("id");
		var action = 'getSlaDetails';
		$.ajax({
			url: 'sla_action.php',
			method: "POST",
			data: { slaId: slaId, action: action },
			dataType: "json",
			success: function(data){
				$('#slaModal').modal('show');
				$('#slaId').val(data.id);
				$('#sla').val(data.name);
				$('#status').val(data.status);				
				$('.modal-title').html("<i class='fa fa-plus'></i> Edit SLA");
				$('#action').val('updateSla');
				$('#save').val('Save');
			}
		});
	});		
	
	$('#addSla').click(function(){
		$('#slaModal').modal('show');
		$('#slaForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add SLA");
		$('#action').val('addSla');
		$('#save').val('Save');
	});	
		
	$(document).on('submit', '#slaForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled', 'disabled');
		var formData = $(this).serialize();
		$.ajax({
			url: "sla_action.php",
			method: "POST",
			data: formData,
			success: function(data){				
				$('#slaForm')[0].reset();
				$('#slaModal').modal('hide');				
				$('#save').attr('disabled', false);
				slaData.ajax.reload();
			}
		});
	});				
	
	$(document).on('click', '.delete', function(){
		var slaId = $(this).attr("id");		
		var action = "deleteSla";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url: "sla_action.php",
				method: "POST",
				data: { slaId: slaId, action: action },
				success: function(data) {					
					slaData.ajax.reload();
				}
			});
		} else {
			return false;
		}
	});	
});
