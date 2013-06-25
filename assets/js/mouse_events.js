$(document).ready(function(){
	var r=7;
	$('.icon-pencil').mouseover=function(){
		alert(r);
		$('.icon-pencil').each(function(i, obj) {


			obj.css("background-color","yellow");
			obj.css("background-color","yellow");
		});
	}


})

function SelectText (post_id) {
	var input = document.getElementById('comment'+post_id);
	input.focus();
	input.setSelectionRange(2,5);
}