<?php
class timeline
{

	function index()
	{
		global $request;
		$this->scripts[] = 'timeline_index.js';
		$user_id = $_SESSION['user_id'];
		//siits saan kõik selle konkreetse kasutaja postitused, posti id ka
		$posts = get_all(
			"SELECT * FROM post WHERE post.user_id ='$user_id' AND post.deleted=0  ORDER BY post.post_id DESC");

		foreach($posts as &$post){
			$post_id=$post['post_id'];
			$comments= get_all("SELECT * FROM comment WHERE comment.post_id='$post_id' AND comment.deleted=0 ");
			foreach($comments as $comment){
				$post[]=['comment'=>$comments];
			}

		}
		//die(var_dump($posts));

		if (isset($_POST["post"])) {
			$post_text = $_POST["post"];
			$post_id = q("INSERT INTO post SET text = '$post_text', user_id = '$user_id'");
		}

		if (isset($_POST["comment"])) {
			$com_text = $_POST["comment"];
			$postitus = '120';
			$post_id = q(
				"INSERT INTO comment SET text = '$com_text', user_id ='$user_id',post_id='120'");
		}

		require 'views/master_view.php';
	}
}