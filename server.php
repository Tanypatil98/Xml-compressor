<?php
	
	$username='';
	$email='';
	$password_1='';
	$password_2='';
	$errors=array();

	$db=mysqli_connect('localhost','root','','users');

	if(isset($_POST['submit'])){
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password_1=mysqli_real_escape_string($db,$_POST['password_1']);
		$password_2=mysqli_real_escape_string($db,$_POST['password_2']);
	}

	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($email)){
		array_push($errors, "email is required");
	}
	if(empty($password_1)){
		array_push($errors, "Password is required");
	}
	if($password_1 != $password_2){
		array_push($errors, "Password does not match");
	}

	if(count($errors)==0){
		$passw_1=md5($password_1);
		$sql="INSERT INTO user(username,email,pass_1) VALUES ('$username','$email','$passw_1')";
		mysqli_query($db,$sql);
		$_SESSION['username']=$username;
		$_SESSION['sucess']="you are logged in.";
		alert("you are logged in");
		header('location:index.php');
	}


	

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location:login.php');
	}
?>