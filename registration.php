<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" />
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.form.js"></script>
	<style type="text/css">
		.form{
	width: 250px;
	margin: 0 auto;
}
input[type='text'], input[type='email'],
input[type='password'] {
     width: 200px;
     border-radius: 2px;
     border: 1px solid #CCC;
     padding: 10px;
     color: #333;
     font-size: 14px;
     margin-top: 10px;
}
input[type='submit']{
     padding: 10px 25px 8px;
     color: #fff;
     background-color: #0067ab;
     text-shadow: rgba(0,0,0,0.24) 0 1px 0;
     font-size: 16px;
     box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0;
     border: 1px solid #0164a5;
     border-radius: 2px;
     margin-top: 10px;
     cursor:pointer;
}
input[type='submit']:hover {
     background-color: #024978;
}
a{
     color:#0067ab;
     text-decoration:none;
}
a:hover{
     text-decoration:underline;
}
	</style>
</head>
<body>
<?php
	session_start();
	$email=$password=$fname=$lname=$passwordc='';
	$echo1=$echo2=$echo3=$echo4=$echo5='';
	$er='';
	$errors=array();

	$db=mysqli_connect('localhost','root','','users');

	if(isset($_POST['submit'])){
		$fname=mysqli_real_escape_string($db,$_POST['fname']);
		$lname=mysqli_real_escape_string($db,$_POST['lname']);
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
		$passwordc=mysqli_real_escape_string($db,$_POST['passwordc']);

	if (empty($_POST['fname'])) {
		$echo1= "<div class='form'><p>Please enter Firstname</p></div>";
	}
	if (empty($_POST['lname'])) {
		$echo2= "<div class='form'><p>Please enter Lastname</p></div>";
	}
	if (empty($_POST['email'])) {
		$echo3= "<div class='form'><p>Please enter email</p></div>";
	}
	if (empty($_POST['password'])) {
		$echo4= "<div class='form'><p>Please enter Password</p></div>";
	}
	if ($password != $passwordc) {
		$echo5= "<div class='form'><p>Password does not match</p></div>";
	}
	

	
	if (count($errors)==0) {
		$sqll="SELECT Email FROM user WHERE Email='$email'";
		$result= mysqli_query($db,$sqll);
		if(mysqli_num_rows($result)== 1){
				echo "<div class='form'><p>Please used another name & email</p></div>";
			

		}else{
			$pass=md5($password);
			$sql="INSERT INTO user(Firstname,Lastname,Email,Password) Values('$fname','$lname','$email','$pass')";
			mysqli_query($db,$sql);
			$_SESSION["fname"]=$fname;
			header('location:index.php');												
		}
	}
}

?>
	<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <a class="navbar-brand" href="#">Xml Compressor</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li><a href="./index.php">Compressor</a></li> 
			        <li><a href="./decompressor.php">Decompressor</a></li>
			        <li><a href="./guide.php">Guide</a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li class="active"><a href="./registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			        <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      </ul>
			    </div>
			  </div>
		</nav>
	<div class="form">
	 <h2>Register users</h2>
	 <form action="registration.php" name="myform" method="post">
	 	<label>Firstname:</label>
	 	<input type="text" name="fname" placeholder="Jhon" >
	 	<?php echo $echo1; ?><br>
	 	<label>Lastname:</label>
	 	<input type="text" name="lname" placeholder="Decosta"><?php echo $echo2; ?><br>
	 	<label>Email:</label>
	 	<input type="email" name="email" placeholder="ab@gmail.com" ><?php echo $echo3; ?><br>
	 	<label>Password:</label>
	 	<input type="password" name="password" ><?php echo $echo4; ?><br>
	 	<label>Confirm Password:</label>
	 	<input type="password" name="passwordc" ><?php echo $echo5; ?><br>
	 	<input type="submit" name="submit" value="Register">
	 	<p>If already register  <a href="login.php">login</a></p>
	 </form>
	</div>

</body>
</html>