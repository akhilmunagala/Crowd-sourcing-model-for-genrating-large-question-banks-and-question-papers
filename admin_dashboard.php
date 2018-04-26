<?php

session_start();
if(isset($_SESSION['a_id'])){
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard - Question Paper Generator</title>
	<!-- <link typye="text/css" rel="stylesheet" href="./css/main.css"> -->
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/admin.css">

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
		<div class="ptitle">
			<h1>- Admin Dashboard -</h1>
		</div>
		<p class="logout">
			<a href="./includes/logout-process.php">Logout</a>
		</p>
		<div class="funcs">
			<!-- <div class="shead">
				<h1>Services</h1>
			</div> -->
			<div class="row">
				<form method="POST" action="./viewAllQuestions.php">
					<button type="submit" name="adminView">View Questions</button>
				</form>
			</div>
			<div class="row">
				<form method="POST" action="./viewLecturer.php">
					<button type="submit" name="adminLecturerView">Lecturer List</button>
				</form>	
			</div>

			<div class="row">
				<form method="POST" action="./sendNotification.php">
					<button type="submit" name="adminNotify">Send Notification</button>
				</form>
			</div>
			<div class="row">
				<form method="POST" action="./questionPaperGenerator.php">
					<button type="submit" name="adminGenerate">Generate Question Paper</button>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>



<?php

}else{
	header("Location: ./admin.php");
}
?>