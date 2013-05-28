function publish() {

	var text = document.getElementById('post').value;
	var comment = [
		'<div id="post2">',
		'<p>',text, '</p>',
		'</div>'
	].join('');
	$(comment).hide().appendTo('body').fadeIn();
	alert("jehhei");


}
