function publish() {
	//retrieve comments to display on page
	//add click handler for button
	//define ajax config object
	var str=document.getElementById('post').value;

	if(str.length > 0&& $.trim(str)!='')
	{
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/add/',
		data   : "&post=" + document.getElementById('post').value,
		success: function (data) {
			var post_id=data;
		//create a container for the new comment
			//$("<div>").addClass("well well-small").text($("#my_post").find("textarea").val()).appendTo('#posts').hide().fadeIn("slow");

			var post_text=document.getElementById('post').value;

			$('#old_posts').prepend('<div id="post'+post_id+
				'" class="well well-small"'+
				'style="padding: 10px; text-align:left;background-color:rgb(250, 251, 251); width: 33%">'+
				'<i class="icon-pencil" style="cursor:pointer;float: right;opacity:0.1;filter:alpha(opacity=10)"'+
				'onclick="delete_post('+post_id+')"></i>'+
				'<p>'+post_text+'</p>'+
				'<p id="like_post" style="visibility:hidden;float: right">0</p>'+
				'<img style="float: right; margin-right: 10px;" src="'+BASE_URL+'assets/images/like.png" alt="like pic">'+
				'<p style="cursor:pointer;color:#3b5998;" onclick="likes_post('+post_id+',0)">Meeldib!</p>'+
				'<p style="cursor:pointer;color:#3b5998;" onclick="commentbox('+post_id+')">kommenteeri!</p>'+
				'<div id="new_com'+post_id+'"></div></div>');

			//empty inputs
			$("#my_post").find("textarea").val("");
		}
	};
	$.ajax(ajaxOpts);
	}
	else
	{ alert("Post is empty");
		$("#my_post").find("textarea").val("");
	}
}
function publish_comment(post_id) {
	var str=document.getElementById('comment'+post_id).value;
	if(str.length > 0&& $.trim(str)!='')
	{
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

			$('#new_com'+post_id).prepend('<div id="old_com'+comment_id+
				'" class="well well-small">'+
				'<p>'+com_text+'</p>'+
				'<p id="like_com" style="visibility:hidden;float: right">0</p>'+
				'<img style="float: right; margin-right: 10px;" src="'+BASE_URL+'assets/images/like.png" alt="like pic">'+
				'<p style="cursor:pointer;color:#3b5998;" onclick="likes_com('+comment_id+',0)">Meeldib!</p>');

			$('#comment'+post_id).val("");
		}
	};
	$.ajax(ajaxOpts);
	}
	else{
		alert("Where is your comment?");
		$('#comment'+post_id).val("");
	}
};

function likes_post(post_id,likes)
{
	likes++;
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/add/'+post_id,
		data   : "&likes_post=" + 1,
		success: function (data) {

			$('#post'+post_id).find("#like_post").text(likes).css("visibility","visible");
			$('#post'+post_id).find('#like_unlike').text('Eemalda meeldimine!');
			//document.getElementById('like_unlike'+post_id).onClick=delete_post_like(post_id);
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
		data   : "&likes_com=" + 1,
		success: function (data) {
//likeda saab ainult yhe korra, selle kasutaja jaoks tuleb see konkreetne nupp disable panna
			//likede jaoks eraldi tabel kus on see likenud kasutaja, siis saab kontrollida
			$('#old_com'+comment_id).find("#like_com").text(likes).css("visibility","visible");
		}
	};
	$.ajax(ajaxOpts);


}
function commentbox(post_id)
{
	$('#post'+post_id).append('<textarea id="comment'+post_id+
		'" title="Kommenteeri" name="comment" placeholder="Kommenteeri"'+
	'style="height:48px;font-size:11px"></textarea>'+
		'<button  onclick="publish_comment('+post_id+')" id="add" >Postita</button>');
	$('#comment'+post_id).focus();
}