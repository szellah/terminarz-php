
function toggleVisibility(box,destination){
		

		var id = $(box).attr("value");
		

		if($(box).prop("checked") == true)
		{
			var visible = 1;
		}
		else
		{
			var visible = 0;
		}


		var data = {
			"search_data" : 1,
			"id": id,
			"Widoczny": visible
		};

		$.ajax({
			type: "post",
			url: destination,
			data: data
		});
	}