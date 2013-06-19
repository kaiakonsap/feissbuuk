function delete_post(post_id)
{
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/edit',
		data   : "&deletes_post=" + post_id,
		success: function (data) {

			$('#post'+post_id).remove();
		}
	};
	$.ajax(ajaxOpts);
}
function delete_com(com_id)
{
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/edit',
		data   : "&deletes_com=" + com_id,
		success: function (data) {

			$('#old_com'+com_id).remove();
		}
	};
	$.ajax(ajaxOpts);
}
function delete_post_like(post_id,likes)
{
	likes--;
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/edit/',
		data   : "&deletes_post_like=" + post_id,
		success: function (data) {

			$('#post'+post_id).find("#like_post").text(likes);
		}
	};
	$.ajax(ajaxOpts);
}
function delete_com_like(com_id,likes)
{
	likes--;
	var ajaxOpts =
	{
		type   : "post",
		url    : BASE_URL + 'timeline/edit/',
		data   : "&deletes_com_like=" + com_id,
		success: function (data) {
			$('#old_com'+com_id).find("#like_com").text(likes);

		}
	};
	$.ajax(ajaxOpts);
}