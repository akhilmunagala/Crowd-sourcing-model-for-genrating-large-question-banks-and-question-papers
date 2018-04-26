<?php session_start(); 
	if(isset($_SESSION['id'])){ 
?>


<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/dashboard.css">
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

<div id="error">
<?php 
					
	if(isset($_GET['result'])){
		if($_GET['result'] != 'success'){
			echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
		}
		else{
			echo '<div class="alert alert-success" role="alert"><h2>Registration was successfull!</h2></div>';
		}
		
	}

?>
</div>
<div class="nav-wrapper">
	<div class="nav">
	<span class="home">
		<form method="POST" action="./index.php">
			<button type="submit" name="submit">Home</button>
		</form>
	</span>
	<span class="logout">
		<form method="POST" action="./includes/logout-process.php">
			<button type="submit" name="submit">Logout</button>
		</form>
	</span>
	
	</div>
</div>


<div class="welcome">
	<span>Welcome:
		<?php 
			if($_SESSION['gender'] == 'male'){
				echo "<strong> Mr.".$_SESSION['fname']." ".$_SESSION['lname']."</strong>";
			}
		?>
	</span>
</div>
<div class="menu">
	<div class="submitQuestions">
		<form method="POST" action="submitQuestions.php">
			<button type="submit" name="submitQuestions">Submit Questions</button>
		</form>
	</div>

	<div class="viewQuestions">
		<form method="POST" action="viewQuestions.php">
			<button type="submit" name="viewQuestions">View Submitted Questions</button>
		</form>
	</div>

	<div class="changePassword">
		<form method="POST" action="changePassword.php">
			<button type="submit" name="changePassword">Change Password</button>
		</form>
	</div>

</div>

<?php 
}else{
	header("Location: ./login.php");
}
?> 