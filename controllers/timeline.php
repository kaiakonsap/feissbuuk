<?php
class timeline {
	function index()
	{
		global $request;
		$this->scripts[] = 'timeline_index.js';
		$user_id =$_SESSION['user_id'];
		$posts=get_all("SELECT post.user_id as owner,post.text as the_post,comment.text as the_comment,comment.user_id as commentor,comment.date as comment_date
 FROM post LEFT JOIN comment ON comment.post_id=post.post_id WHERE post.user_id =1 AND post.deleted=0 ORDER BY post.post_id DESC
		");
		//$comments=get_all("SELECT * FROM comment WHERE deleted='0' ORDER BY post_id ASC");

		if(isset($_POST["post"])){
		$text=$_POST["post"];
			var_dump($_POST);
			$post_id = q("INSERT INTO post SET text = '$text', user_id = '$user_id'");
		}
		require 'views/master_view.php';
	}
}