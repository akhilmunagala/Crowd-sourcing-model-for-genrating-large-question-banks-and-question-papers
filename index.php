<!DOCTYPE html>
<html>
<head>
	<title>Home - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
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
			<h1>Question bank generator using crowd sourcing model</h1>
		</div>
		<div class="notification">
			<p><marquee>
				
				<?php
					include './includes/db.php';
					//retriving data from database
					$sql = "SELECT * FROM notifications";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if($resultCheck <1){
						//if there are no notifictions in database
						echo "There are no new notifications at the moment.";
					}else{
						//if notifications are present in database
						$i = 1;
						while($row = mysqli_fetch_assoc($result)){
							echo $i.") ".$row['notification']."   ";
							$i++;
						}
								
					}
				?>

			</marquee></p>
		</div>
		<div class="funcs">
			<div class="shead">
				<h1>Services</h1>
			</div>
			<div class="row">
				<div class="block">
					<div class="icon b1">
						<i class="fas fa-user fa-7x"></i>
					</div>
					<div class=	"button">
						<div class="bwrap">
							<a href="login.php">Lecturer Login</a>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="icon b2">
						<i class="fas fa-user-plus fa-7x"></i>
					</div>
					<div class=	"button">
						<div class="bwrap">
							<a href="signup.php">Lecturer Signup</a>
						</div>
					</div>
				</div>
				<div class="block">
					<div class="icon b3">
						<i class="fas fa-eye fa-7x"></i>
					</div>
					<div class=	"button">
						<div class="bwrap">
							<a href="./admin.php">Admin Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>