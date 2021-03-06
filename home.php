<?php
	session_start()
	if (empty($_SESSION["email"])) {
		header("Location:login.php");
		exit;
	}

	if(isset($_GET['logout'])){
		//session_start();
		unset($_SESSION["fname"]);
		unset($_SESSION["email"]);
		session_destroy();
		header("location:login.php");
	}
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Xml Compressor</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="./style.css">
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.form.js"></script>
		<style type="text/css">
			.pt{
			     padding-left: 500px;
			}
			@media only screen and (max-width: 1000px) {
			  .pt {
			    padding-left: 110px;
			  }
			}
			
			.st{
			     padding-left: 500px;
			}
			@media only screen and (max-width: 1000px) {
			  .st {
			    padding-left: 110px;
			  }
			}
			
		</style>
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
			        <li class="active"><a href="home.php">Compressor</a></li> 
			        <li><a href="decomp.php">Decompressor</a></li>
			        <li><a href="guid.php">Guide</a></li>
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
			<h1 align="center">Compress a Xml File</h1>
			
			<br />
			<div class="panel panel-default">
				<div class="panel-heading"><b>Reduce a file size while optimizing maximum XML quality</b></div>
				<div class="panel-body file-upload-wrapper">
					<form id="uploadImage" action="upload.php" method="post" enctype="multipart/form-data">
						<div class="form-group files">
							<label>File Upload</label>
							<div class="dropzone-wrapper" >
				              <div class="dropzone-desc">
				                <img  class="im" src="/progress/css/icons8-upload-to-cloud-50.png">
				                <p>Choose an XML file or drag it here.</p>
				                
				              </div>
				              
				              <input type="file" name="uploadFile" class="dropzone na" id="uploadFile" accept=".xml" multiple />
				            </div>
				            <div class="pt" id="pfile" >
				         			<img class="image_file" style="display: none;" src="./css/icons8-xml-file-80.png">
				         			<p id="select_file" style="padding-left: 12px;"></p>
				              </div>
						</div>
						<div class="form-group st">
							<input type="submit" id="uploadSubmit" value="Upload File" class="btn btn-info" />
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div id="targetLayer" style="display:none;"></div>
					</form>
					<div id="loader-icon" style="display:none; width: 10px;"><img src="loader.gif" /></div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	$('#uploadImage').submit(function(event){
		if($('#uploadFile').val())
		{
			event.preventDefault();
			$('#loader-icon').show();
			$('#targetLayer').hide();
			$(this).ajaxSubmit({
				target: '#targetLayer',
				beforeSubmit:function(){
					$('.progress-bar').width('10%');
				},
				uploadProgress: function(event, position, total, percentageComplete)
				{
					$('.progress-bar').animate({
						width: percentageComplete + '%'
					}, {
						duration: 1000
					});
				},
				success:function(){
					$('#loader-icon').hide();
					$('#targetLayer').show();
				},
				resetForm: true
			});
		}
		return false;
	});
});
    
    $('#uploadFile').change(function() {
        var filename = $('#uploadFile').val();
        var arr= filename.slice(12);
        $('#select_file').html(arr);
        $('#pfile').show();
        $('.image_file').css("display","block");
        $('.dropzone-wrapper').hide();
    });


 
$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});
 
$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});
</script>
