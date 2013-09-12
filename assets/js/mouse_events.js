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
		d1.insertAdjacentHTML('afterend',
			'<div id="change_cover" class="btn-group" style="position:absolute;top: 23% ;right: 35%;">'+
			'<button class="btn dropdown-toggle" data-toggle="dropdown">Vaheta kaanepilti</button>	'+

	'<ul class="dropdown-menu">'+
		'<!-- dropdown menu links -->'+
			'<li><a href="#">Vali fotodest</a></li>'+
				'<li><form action="upload" method="post"'+
		'enctype="multipart/form-data"><input type="file">'+
				'<input type="submit" name="submit" value="Submit"></form></li>'+
			'	<li class="divider"></li>'+
'			<li><a href="#">Another link</a></li>'+
'			</ul>'+
'			</div>');
		//$("#change_cover").mouseenter(function() {
		//	var d2 = document.getElementById('cover');
		//	d2.insertAdjacentHTML('afterend ','<p style="position: fixed;top: 25%;right: 45%">Vali miskit</p>');
			//ei tööta
		//})
	})

	$("#cover").mouseleave(function() {
			$('#change_cover').css('display','none');
		});

	$("#profile_image").mouseenter(function() {
		var d1 = document.getElementById('profile_pic');
		d1.insertAdjacentHTML('afterend', '<button style="position:absolute;top: 23% ;right: 85%" id="change_profile_pic">Vaheta profiilipilti</button>');

	})

	$("#profile_image").mouseleave(function() {
		$('#change_profile_pic').css('display','none');
	});

})


function SelectText (post_id) {
	var input = document.getElementById('comment'+post_id);
	input.focus();
	input.setSelectionRange(2,5);
}