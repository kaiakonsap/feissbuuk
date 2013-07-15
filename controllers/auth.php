<?php

class auth {
	function index(){
		global $request;
		global $errors;
		global $username;

		if (isset($_SESSION['session_expired'])){
			$errors[] = "Sessioon on aegunud!";
			unset($_SESSION['session_expired']);
		}
		if (isset($_POST['username'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user_id = get_one("SELECT user_id FROM user WHERE username = '$username' AND password = '$password'");
			if (! empty($user_id)){
				$_SESSION['user_id'] = $user_id;
				$request->redirect('facebook');
			} //sisuliselt else
			$errors[] = "Vale kasutajanimi või parool";
		}
		if (isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['password'])){
		$newuser=$_POST['firstname']." ".$_POST['lastname'];
			$the_password=$_POST['password'];
			$id=q("INSERT INTO user SET username='$newuser',password='$the_password'");
		if(!empty($id)){
			$_SESSION['user_id']=$id;
			$request->redirect('facebook');
		}
		}

		require 'views/auth_view.php';
	}
	function logout(){
		global $request;
		session_destroy();
		$request->redirect('auth');
	}
}