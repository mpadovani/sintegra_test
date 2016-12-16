$(document).ready(function() {
    $(".abreModalDeletarSintegra").unbind("click").click( function() {
		$('#confirmModal').modal('show'); 
		$('#titleConfirmModal').html("Deletar Sintegra");

		$('#bodyConfirmModal').html("Deletar, essa ação não pode ser desfeita.")

		$('#deletarSintegra').attr("data-id", $(this).attr("data-id"))

		return false;
	});

	$("#deletarSintegra").unbind("click").click( function() {
	
		$.ajax({
			type: "DELETE",
			url: '/api/delete-sintegra/'+$(this).attr("data-id"),
			cache: false,
			contentType: false,
			processData: false,

			success: function(data){
				$('#confirmModal').modal('hide'); 
			},
			error: function(xhr, ajaxOptions, thrownError){
				alert("Error Status: " + xhr.status + " Thrown Errors: "+thrownError);
			}
		});


	});
});