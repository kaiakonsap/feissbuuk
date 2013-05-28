function publish() {
	//retrieve comments to display on page
	//add click handler for button
	alert("AAA");
	//define ajax config object
	var ajaxOpts =
	{

		type   : "post",
		url    : BASE_URL + 'timeline/index/',
		data   : "&post=" + document.getElementById('post').value,
		success: function (data) {
			alert("OOOO");
			//create a container for the new comment
			$("<div>").addClass("comment").text($("#comment").find("textarea").val()).appendTo('#comments').hide().fadeIn("slow");

			//empty inputs
			$("#comment").find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
};

