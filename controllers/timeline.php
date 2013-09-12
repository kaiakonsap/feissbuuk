<?php
class timeline
{
	public $requires_auth = TRUE;

	function index()
	{
		global $_user;
		global $request;
		$this->scripts[] = 'add_index.js';
		$this->scripts[] = 'edit_delete.js';
		$this->scripts[] = 'mouse_events.js';
		$user_id = $_SESSION['user_id'];
		//siits saan kõik selle konkreetse kasutaja postitused, posti id ka
		$posts = get_all(
			"SELECT * FROM post WHERE post.user_id ='$user_id' AND post.deleted=0  ORDER BY post.post_id DESC");
		/**
		 * Uue postituse korral ja commmidel saab 2x likeda! javascript ei tööta hästi
		 * eemalda meeldimise taga pole funktsionaalsust javascriptis vähemasti\
		 * äsjaloodud kommentaaril puuduv unlike funktsioon
		 * kommenteeri nupp vajab kontrolli,et ehk on juba üks tekstikast olemas
		 * Lisa postitustele/commidele aeg
		 */

		foreach($posts as &$post){
			$post_id=$post['post_id'];
			$comments= get_all("SELECT * FROM comment WHERE comment.post_id='$post_id' AND comment.deleted=0");
			$likes= get_all("SELECT COUNT(user_id) as 'number' FROM likes_post WHERE likes_post.post_id='$post_id' AND likes_post.deleted=0 ");
			$user_liked=get_one("SELECT num as 'liked' FROM likes_post WHERE likes_post.post_id='$post_id' AND likes_post.user_id='$user_id' AND likes_post.deleted=0 ");

		//	var_dump($user_liked);

			$post['likes']=$likes[0]['number'];
			$post['user_liked']=$user_liked;

			foreach($comments as &$comment){
				$com_id=$comment['comment_id'];

				$likes= get_all("SELECT COUNT(user_id) as 'number' FROM likes_com WHERE likes_com.com_id='$com_id' AND likes_com.deleted=0 ");
				$user_liked=get_one("SELECT num as 'liked' FROM likes_com WHERE likes_com.com_id='$com_id' AND
				likes_com.user_id='$user_id' AND likes_com.deleted=0");
				$comment['likes']=$likes[0]['number'];
				$comment['user_liked']=$user_liked;

			}
			$post[]=['comment'=>$comments];


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
			$post_id = q("INSERT INTO likes_post SET num = '$likes', post_id='$id', user_id='$user_id'");
		}
		if (isset($_POST["likes_com"])) {
			$id=$request->params[0];
			$likes = $_POST["likes_com"];
			$comment_id = q("INSERT INTO  likes_com SET num = '$likes', com_id='$id', user_id='$user_id'");
		}
	}
	function edit()
	{
		$user_id = $_SESSION['user_id'];

		if (isset($_POST['deletes_post']))
		{
			$id=$_POST['deletes_post'];
			$post_del = q("UPDATE post SET deleted =1 WHERE post_id='$id'");

		}
		if (isset($_POST['deletes_com']))
		{
			$id=$_POST['deletes_com'];
			$post_del = q("UPDATE comment SET deleted =1 WHERE comment_id='$id'");

		}
		if (isset($_POST['deletes_post_like']))
		{
			$id=$_POST['deletes_post_like'];
			$likepost_del = q("UPDATE likes_post SET deleted =1 WHERE post_id='$id' AND user_id='$user_id'");
		}
		if (isset($_POST['deletes_com_like']))
		{
			$id=$_POST['deletes_com_like'];
			$likecom_del = q("UPDATE likes_com SET deleted =1 WHERE com_id='$id' AND user_id='$user_id'");
		}
	}
	function upload_prev()
	{
		global $request;
		require 'views/master_view.php';

	}


}