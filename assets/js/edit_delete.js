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