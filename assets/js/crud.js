function edit(hyperlink)  {
	$('#form')[0].reset(); // Reset form on modals. 

	// AJAX load data form ajax 
	$.ajax({
		url      : hyperlink, 
		type     : 'GET', 
		dataType : 'JSON', 
		success  : function(data) {
			$('[name="id"]').val(data.id);
			$('[name="comment"]').val(data.comment); 

			// Trigger modal. 
			$('#modal_form').modal('show'); // Show bootstrap modal when complete loaded.
		},
		error    : function(jqXHR, textStatus, errorThrown) {
			alert('Error get data from ajax');
		}
	});
}
