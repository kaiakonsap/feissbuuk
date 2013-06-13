<?php
class timeline
{

	function index()
	{
		global $request;
		$this->scripts[] = 'add_index.js';
		$user_id = $_SESSION['user_id'];
		//siits saan kõik selle konkreetse kasutaja postitused, posti id ka
		$posts = get_all(
			"SELECT * FROM post WHERE post.user_id ='$user_id' AND post.deleted=0  ORDER BY post.post_id DESC");

		foreach($posts as &$post){
			$post_id=$post['post_id'];
			$comments= get_all("SELECT * FROM comment WHERE comment.post_id='$post_id' AND comment.deleted=0 ");
			//$likes= get_all("SELECT * FROM liked WHERE liked.post_id='$post_id' AND liked.deleted=0 ");
			//var_dump($post['likes']);
			foreach($comments as $comment){
				$post[]=['comment'=>$comments];
			}
		}
		require 'views/master_view.php';
	}

	function add()
	{
		$user_id = $_SESSION['user_id'];
		global $request;
		if (isset($_POST["post"])) {
			$post_text = $_POST["post"];
			$post_id = q("INSERT INTO post SET text = '$post_text', user_id = '$user_id'");
			echo $post_id;
		}

		if (isset($_POST["comment"])) {
			$id=$request->params[0];
			$the_post=$_POST["comment"] ;
			$comment_id = q("INSERT INTO comment SET text = '$the_post', user_id ='$user_id',post_id='$id'");
			echo $comment_id;

		}

		if (isset($_POST["likes_post"])) {
			$id=$request->params[0];
			$likes = $_POST["likes_post"];
			$post_id = q("UPDATE post SET likes = '$likes' WHERE post_id='$id'");
		}
		if (isset($_POST["likes_com"])) {
			$id=$request->params[0];
			$likes = $_POST["likes_com"];
			$comment_id = q("UPDATE comment SET likes = '$likes' WHERE comment_id='$id'");
		}
	}
}