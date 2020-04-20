
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
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
	$email=$password=$echo1=$echo2=$echo3=$fname='';
	$errors=array();
	$db=mysqli_connect('localhost','root','','users');

	if(isset($_POST['login'])){
		$email=mysqli_real_escape_string($db,$_POST['email']);
		$password=mysqli_real_escape_string($db,$_POST['password']);

	if (empty($_POST['email'])) {
		$echo1= "<div class='form'><p>Please enter Email</p></div>";
	}
	if (empty($_POST['password'])) {
		$echo2= "<div class='form'><p>Please enter Password</p></div>";
	}
	if (empty($_POST['email']) AND empty($_POST['password'])) {
		$echo3= "<div class='form'><p>Please enter Password</p></div>";
	}

	if (count($errors)==0) {
		$passe=md5($password);
		$sql1="SELECT Email,Password FROM user WHERE Email='$email'";
		$re=mysqli_query($db,$sql1);
		$row1=mysqli_fetch_assoc($re);
		$sqll="SELECT Email,Password FROM user WHERE Email='$email' AND Password='$passe'";
		$result= mysqli_query($db,$sqll);
		
		 if(mysqli_num_rows($result)== 1){
		 	$sqll1="SELECT Firstname FROM user WHERE Email='$email' AND Password='$passe'";
			$result1= mysqli_query($db,$sqll1);
			$row2=mysqli_fetch_assoc($result1);
			$_SESSION["fname"]=$row2["Firstname"];
			$_SESSION["email"]=$email;
			$_SESSION["password"]=$password;
			if(!empty($_SESSION["email"]) and !empty($_SESSION["password"])){

				header("location:home.php");
			}
		}//else{
				
				//echo "<div class='form'><p>Username and password are wrong</p></div>";
			//}
			/*if($row=mysqli_fetch_assoc($result) == 0){
				if ($email != $row1["Email"] and $passe != $row1["Password"]) {
				
				$pass=md5($password);
				$sql="INSERT INTO User(Email,Password) Values('$email','$pass')";
				mysqli_query($db,$sql);
				$_SESSION["email"]=$email;
				$_SESSION["password"]=$password;
				if(!empty($_SESSION["email"]) and !empty($_SESSION["password"])){

				header("location:home.php");
			}
			
			}
		
	}*/
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
			      <a class="navbar-brand" href="index.php">Xml Compressor</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li><a href="./index.php">Compressor</a></li> 
			        <li><a href="./decompressor.php">Decompressor</a></li>
			        <li><a href="./guide.php">Guide</a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="./registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			        <li class="active"><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			      </ul>
			    </div>
			  </div>
		</nav>
	<div class="form" >
	 <h2 >Login users</h2>
			 <form action="" class="form" name="login"  method="post">
			 	<div class="input-group">
			 	<label>Username:</label>
			 	<input type="email" name="email" placeholder="jon@gmail.com"><?php echo $echo1; ?><br>
			 	</div>
			 	<div class="input-group">
			 	<label>Password: </label>
			 	<input type="password" name="password"><?php echo $echo2; ?><br>
			 	</div>
			 	<input type="submit" class="btn" name="login"><br>
			 	<?php echo $echo3; ?>
			 	<p>You not yet ? <a href="./registration.php">Register</a></p>
			 </form>
	</div>
	 
</body>
</html>