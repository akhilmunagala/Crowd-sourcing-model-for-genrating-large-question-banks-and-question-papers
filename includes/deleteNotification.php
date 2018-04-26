<?php
	session_start();
	if(isset($_SESSION['a_id']) && isset($_GET['id'])){
		include 'db.php';
		$sql = "DELETE FROM notifications WHERE Id =".$_GET['id'];
		$result = mysqli_query($conn,$sql);
		if(!$result){
		  		$error_string = "error while deleting notification<br>";
		  		header("Location: ../viewNotifications.php?result=$error_string");
		  		exit();
	  		}else{
	  			header("Location: ../viewNotifications.php?result=success");
	  		}
	}
?>