<?php session_start();
	if(isset($_SESSION['email'])){
		header("Location: ./dashboard.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Question Paper Generator</title>
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
			<form action="./includes/signin-process.php" method="POST">
			<h1>Login</h1>
			<div class="error">
				<?php 
						if(isset($_GET['login'])){
							
								echo '<div class="alert alert-danger" role="alert">'.$_GET["login"].'</div>';
							}

				?>

			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
			  </div>
			  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="email">
			</div>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><i class="fas fa-eye"></i></span>
			  </div>
			  <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1" name="password">
			</div>

			<button type="submit" name="submit" class="btn btn-warning bcustom">Login</button>
			<p class="left"><a href="forgot.php">forgot password</a></p>
			<p class="right"><a href="signup.php">new user? Signup</a></p>
		</form>
		</div>
			
	</div>
</body>
</html>