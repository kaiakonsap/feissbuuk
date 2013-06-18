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