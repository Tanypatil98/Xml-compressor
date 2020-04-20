<?php
	session_start();
	$username='';
	$password_1='';
	$errors=array();

	$db=mysqli_connect('localhost','root','','users');

	if(isset($_POST['login'])){
		
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password_1=mysqli_real_escape_string($db,$_POST['password_1']);

	}

		if(empty($username)){
		array_push($errors, "Username is required");
		}

		if(empty($password_1)){
		array_push($errors, "Password is required");
		}

	if(count($errors)==0){
		$passw_2=md5($password_1);
		$sqll="SELECT * FROM user WHERE username='$username' AND pass_1='$passw_2'";
		$resul=mysqli_query($db,$sqll);
		if (mysqli_num_rows($resul) == 1) {
			$_SESSION['username']=$username;
			$_SESSION['sucess']="you are logged in.";
			
			header('location:index.php');
			
		}else{
			array_push($errors, "Wrong username/password combination");
			echo "Wrong username/password combination";
			header('location:login.php');
		}
	}

?>