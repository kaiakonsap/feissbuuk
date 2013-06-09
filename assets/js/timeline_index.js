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
			$("<div>").addClass("well well-small").text($("#my_post").find("textarea").val()).appendTo('#posts').hide().fadeIn("slow");

			var button = document.createElement("button");
			//	var string="'publish_comment('+post_id+')'";
			///kuidagi o vaja siia saada postituse id
			button.innerHTML = "Click on me!";
			button.onclick = function(){
				likes_post(post_id,0);return false;
			};
			$('#posts').append(button);

			//empty inputs
			$("#my_post").find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
}
function publish_comment(post_id) {

	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/index/'+post_id,
		data   : "&comment=" + document.getElementById('comment').value,
		success: function (data) {

			$("<div>").addClass("well well-small").text($('#'+post_id).find("textarea").val()).appendTo('#com'+post_id).hide().fadeIn("slow");

			var button = document.createElement("button");
	//	var string="'publish_comment('+post_id+')'";
			button.innerHTML = "Click on me!";
			button.onclick = function(){
				///Kuidagi on vaja siia saada kommentaari id
				likes_com(comment_id,0);return false;
			};
			$('#'+post_id+'com').append(button);


			//empty inputs
			$('#post'+post_id).find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
};

function likes_post(post_id,likes)
{
	likes++;
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/index/'+post_id,
		data   : "&likes_post=" + likes,
		success: function (data) {

			$('#post'+post_id).find("#like_post").text(likes);
		}
	};
	$.ajax(ajaxOpts);


}
function likes_com(comment_id,likes)
{
	likes++;
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/index/'+comment_id,
		data   : "&likes_com=" + likes,
		success: function (data) {

			$('#com'+comment_id).find("#like_com").text(likes);
		}
	};
	$.ajax(ajaxOpts);


}