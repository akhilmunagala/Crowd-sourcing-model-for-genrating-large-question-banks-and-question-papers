<?php
	session_start();

	if(isset($_POST['sendNotification']) && isset($_SESSION['a_id'])){
		$error = false;
		$error_string = "";
		if(empty($_POST['notification'])){
			$error = true;
			$error_string = "notification cannot be empty";
			header("Location: ../sendNotification.php?result=$error_string");
			exit();
		}else{
			include 'db.php';
			$notification = mysqli_real_escape_string($conn,$_POST['notification']);
			$sql = "INSERT INTO notifications(notification) VALUES ('$notification')";
			$result = mysqli_query($conn,$sql);
			if(!$result){
		  		$error = true;
		  		$error_string .= "error while uploading notification<br>";
		  		header("Location: ../sendNotification.php?result=$error_string");
		  		exit();
	  		}else{
	  			header("Location: ../sendNotification.php?result=success");
	  		}

		}
	}
?>