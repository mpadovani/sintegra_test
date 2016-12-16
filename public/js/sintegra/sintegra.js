$(document).ready(function(){
	$("#buscarAPI").unbind("click").click( function() {

		$("#sintegraAPI").show();
		$("#message").html("");
		$("#json").html("");

		if ( $("#cnpj").val() == "" ) {
			return false;
		}

		var formData = new FormData();
		formData.append( 'cnpj', $("#cnpj").val() );

		$.ajax({
			type: "POST",
			url: '/api/sintegra',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,

			success: function(data){
				$("#sintegraAPI").show();
				
				var obj = $.parseJSON(data);

				if (obj.status == "400") {
					$("#message").html(obj.response)
				}
				else {
					var html = "";
					$.each(obj, function (key, data) {
						if ( key != "status" && key != 'response' ) {
							html += "<div class='row'><div class='col-md-6'><b>"+key+":</b> "+data+"</div></div";
							$("#json").html(html)
						}

					});
				}
			},
			error: function(xhr, ajaxOptions, thrownError){
				alert("Error Status: " + xhr.status + " Thrown Errors: "+thrownError);
			}
		});

	});
});