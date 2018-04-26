<?php
	session_start();
	if(isset($_POST['changePassword']) && isset($_SESSION['id']) || isset($_GET['result'])){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Password Change - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/passwordReset.css">
</head>
<body>
	<div class="container">
		<a href="index.php" class="hredirect">
		<div class="header">
			<div class="content">
				<span class="logo">
			</span>
			<div class="text">
				<h1>St.Peter's Engineering College</h1>
				<p>Giving wings to thoughts</p>
			</div>
			</div>
		</div>
	</a>
<hr>
<p><a href="dashboard.php">&lt;back</a></p>
<div id="error">

<?php 
					
	if(isset($_GET['result'])){
		if($_GET['result'] != 'success'){
			echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
		}
		else{
			echo '<div class="alert alert-success" role="alert"><h2>Password Changed Sucessfully!</h2></div>';
		}
		
	}

?>

</div>

	<div class="input-wrap">
		<h2>Reset Password:</h2>
		<form action="./includes/changePassword-process.php" method="POST">
			
		
			<div class="input-group mb-3">
			  <input type="password" class="form-control" placeholder="Enter your current password" aria-label="password" aria-describedby="basic-addon1" name="cpassword" id="cpassword">
			</div>

			<div class="input-group mb-3">
			  <input type="password" class="form-control" placeholder="Enter New Password" aria-label="password" aria-describedby="basic-addon1" name="npassword" id="npassword">
			</div>

			<div class="input-group mb-3">
			  <input type="password" class="form-control" placeholder="Re-type New Password" aria-label="password" aria-describedby="basic-addon1" name="rpassword" id="rpassword">
			</div>

			<button type="submit" name="submit" class="btn btn-warning bcustom">Reset Password</button>

		</form>
	</div>
</div>
</body>
<script src="./script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">

        	$("form").submit(function (e){
        		
        		var error = "";
        		
        		if($("#npassword").val() == ""){
        			 error += "New Password cannot be empty.<br>";
        		}
        		
        		if($("#cpassword").val() == ""){
        			 error += "Current Password cannot be empty.<br>";
        		}
        		if( $("#npassword").val() != ""){
        			if( $("#npassword").val().length < 5 ){
        			 error += "Password cannt be less than 5 letters.<br>";
        			}
        		}
        		if($("#rpassword").val() == ""){
        			 error += "Re-type Password cannot be empty.<br>";
        		}
        		if($("#npassword").val() != $("#rpassword").val()) {
        			error += "Passwords do not match.<br>";
        		}
        		if(error != ""){
        			$("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s):</strong><br>'+error+'</div>');
        			return false;
        		}else{
        			return true;
        		}
        		
        	});


        </script>
</html>
<?php }
	else{
		header("Location: admin_dashboard.php");
	}
?>