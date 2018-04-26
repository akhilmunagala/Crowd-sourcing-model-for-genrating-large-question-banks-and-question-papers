<?php 
session_start();
if(isset($_POST['adminNotify']) || isset($_GET['result']) ||isset($_SESSION['a_id']))
{

?>

<!DOCTYPE html>
<html>
<head>
	<title>Send Notifications - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/dashboard.css">
	<link typye="text/css" rel="stylesheet" href="./css/viewquestions.css">
	<link typye="text/css" rel="stylesheet" href="./css/notification.css">
</head>
<body>
	<div class="container">
		<a href="./index.php">
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

	<p class="left"><a href="admin_dashboard.php">&lt;back</a></p>
	<p class="right"><a href="viewNotifications.php">View Notifications</a></p>
	<div class="heading">
		<h2>Send Notification</h2>
	</div>

	<div class="error">
		<?php 
				if(isset($_GET['result'])){
					if($_GET['result'] != "success"){
						echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
					}
					else{
						echo '<div class="alert alert-success" role="alert">'."Notification Posted Successfully!".'</div>';
						
					}
				}

		?>

	</div>

	<div class="notification">
		<form method="POST" action="./includes/notification_process.php">
			<div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="Enter your notification here" aria-label="password" aria-describedby="basic-addon1" name="notification">
			</div>
			<button type="submit" name="sendNotification" class="btn btn-warning bcustom">Send Notification</button>
		</form>
	</div>
	
</div>

</body>
</html>


<?php
	}else{
		header("Location: ./admin_dashboard.php");
	}
?>