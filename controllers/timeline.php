<?php
class timeline {
	function index()
	{
		global $request;
		$this->scripts[] = 'timeline_index.js';
		$user_id =$_SESSION['user_id'];
		$posts=get_all("SELECT * FROM post WHERE user_id = '$user_id' AND deleted='0'");

		if(isset($_POST["post"])){
		$text=$_POST["post"];
			var_dump($_POST);
			$post_id = q("INSERT INTO post SET text = '$text', user_id = '$user_id'");
		}
		require 'views/master_view.php';
	}
}