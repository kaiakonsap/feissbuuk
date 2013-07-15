$(document).ready(function(){
	var r=7;
	$('.icon-pencil').mouseover=function(){
		alert(r);
		$('.icon-pencil').each(function(i, obj) {


			obj.css("background-color","yellow");
			obj.css("background-color","yellow");
		});
	}
	$("#cover").mouseenter(function() {
		var d1 = document.getElementById('cover_pic');
		d1.insertAdjacentHTML('afterend', '<button style="position: fixed;top: 25%;right: 40%" id="change">Vaheta kaanepilti</button>');

	})
	$("#change").mouseenter(function() {
		(this).css('display','visible');
	})
	$("#cover").mouseleave(function() {
			$('#change').css('display','none');
		});

})


function SelectText (post_id) {
	var input = document.getElementById('comment'+post_id);
	input.focus();
	input.setSelectionRange(2,5);
}