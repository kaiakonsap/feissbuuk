function publish() {

	//retrieve comments to display on page

		//add click handler for button
		$("#add").click(function() {
			alert("OOOO");
			//define ajax config object
			var ajaxOpts = {
				type: "post",
				url: "timeline.php",
				data: "&comment=" + document.getElementById('post').value,
				success: function(data) {

					//create a container for the new comment
					var div = $("<div>").addClass("row").appendTo("#comments");

					// add author name and comment to container

					//empty inputs
					$("#post").find("textarea").val("");

				}
			};

			$.ajax(ajaxOpts);

		});




}
