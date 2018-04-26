<!DOCTYPE html>
<html>
<head>
	<title>Password Reset - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/login.css">
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
		<div class="login-container">
			<form method="POST" action="./includes/resetpwd-process.php">
				<h1>Reset Password</h1>
				<div class="error">
					<?php 

						if(isset($_GET['result'])){
							if($_GET['result'] != 'success'){
								echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
							}else{
								echo '<div class="alert alert-success" role="alert">Password reset successful,please check your mail.</div>';
							}
						}

					?>
				</div>
				<div class="input-group mb-3">
				
				  <input type="text" class="form-control" placeholder="Enter your email id" aria-label="email id" aria-describedby="basic-addon1" name="email">
				
				</div>

				<button type="submit" class="btn btn-warning bcustom" name="submit">Reset</button>
				<p class="left"><a href="login.php">login</a></p>
				<p class="right"><a href="signup.php">new user? Signup</a></p>

			</form>
		</div>
			
	</div>
</body>
</html>