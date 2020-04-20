
<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Xml Compressor</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.form.js"></script>
	</head>
	<body>
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
			        <li><a href="index.php">Compressor</a></li> 
			        <li><a href="decompressor.php">Decompressor</a></li>
			        <li class="active"><a href="guide.php">Guide</a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			      	<?php if(isset($_SESSION['fname'])){ ?>
			      	<li><a href="./index.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['fname']; ?></a></li>
			      	<?php
			      	}else{
			      	?>
			        <li><a href="./registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			    <?php } ?>
			    <?php if(isset($_SESSION['fname'])){ ?>
			    	<li><a href="index.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			    	<?php
			      	}else{
			      	?>
			        <li><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			    <?php } ?>
			      </ul>
			    </div>
			  </div>
		</nav>
		<div class="container">
			<?php if(isset($_SESSION['fname'])){ ?>
			<br />
				<h1 align="center">Welcome To User <?php echo $_SESSION["fname"]; ?> </h1>
				<hr>
			<?php } ?>
			<h1 align="center">User Guide</h1>
			
			<br />
			<div class="panel panel-default">
				<div class="panel-heading"><b>Following are the user Guide Step by Step</b></div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
	</body>
</html>
