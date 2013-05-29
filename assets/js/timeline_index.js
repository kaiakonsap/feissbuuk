function publish() {
	//retrieve comments to display on page
	//add click handler for button
	//define ajax config object
	var ajaxOpts =
	{

		type   : "post",
		url    : BASE_URL + 'timeline/index/',
		data   : "&post=" + document.getElementById('post').value,
		success: function (data) {
		//create a container for the new comment
			$("<li>").addClass("well well-small").text($("#my_post").find("textarea").val()).appendTo('#posts').children()
				.hide().fadeIn("slow");

			//empty inputs
			$("#my_post").find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
}
function publish_comment() {
	//retrieve comments to display on page
	//add click handler for button
	//define ajax config object
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/index/',
		data   : "&comment=" + document.getElementById('comment').value,
		success: function (data) {
			//create a container for the new comment
				$("<li>").addClass("well well-small").text($("#my_comment").find("textarea").val()).appendTo('#comments').children()
				.hide().fadeIn("slow");

			//empty inputs
			$("#my_comment").find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
};

