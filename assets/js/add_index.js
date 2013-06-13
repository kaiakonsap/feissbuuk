function publish() {
	//retrieve comments to display on page
	//add click handler for button
	//define ajax config object
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/add/',
		data   : "&post=" + document.getElementById('post').value,
		success: function (data) {
			var post_id=data;
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
		url    : BASE_URL + 'timeline/add/'+post_id,
		data   : "&comment=" + document.getElementById('comment'+post_id).value,
		success: function (data) {
			if(data>0){
			var comment_id=data;
			}
		//	$("<div>").addClass("well well-small").text($('#new_com'+post_id).find("textarea").val()).appendTo('#posted_com'+post_id).hide().fadeIn("slow");

			//var com_text=$('#comment'+post_id).value;
			var com_text=document.getElementById('comment'+post_id).value;
			alert(com_text);

			$('#new_com'+post_id).prepend('<div id="old_com'+comment_id+
				'" class="well well-small">'+
				'<p>'+com_text+'</p>'+
				'<button onclick="likes_com('+comment_id+',0)">Like!</button>');

			$('#comment'+post_id).val("");
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
		url    : BASE_URL + 'timeline/add/'+post_id,
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
		url    : BASE_URL + 'timeline/add/'+comment_id,
		data   : "&likes_com=" + likes,
		success: function (data) {
//likeda saab ainult yhe korra, selle kasutaja jaoks tuleb see konkreetne nupp disable panna
			//likede jaoks eraldi tabel kus on see likenud kasutaja, siis saab kontrollida
			$('#com'+comment_id).find("#like_com").text(likes);
		}
	};
	$.ajax(ajaxOpts);


}