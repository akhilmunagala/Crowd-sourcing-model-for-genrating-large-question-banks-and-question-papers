<?php
session_start();
	if(isset($_POST['approve']) && isset($_SESSION['a_id'])){
		$id = $_POST['approve'];
		// echo $id;

		include_once "./db.php";

		$sql = "SELECT * FROM login_details WHERE id='$id'";
		$result = mysqli_query($conn,$sql);

		if(!$result){
			$error = true;
			$error_string .= "Error while updating database<br>";
		}else{
				
			while($row = mysqli_fetch_array($result))
			{
				if($row['status'] != 0){
					$sql = "UPDATE login_details SET status = 0 WHERE id = '$id'";
					$result = mysqli_query($conn,$sql);
					if(!$result){
						$error = true;
						$error_string .= "Error while updating database<br>";
					}
				}else{
					$sql = "UPDATE login_details SET status = 1 WHERE id = '$id'";
					$result = mysqli_query($conn,$sql);
					if(!$result){
						$error = true;
						$error_string .= "Error while updating database<br>";
					}
				}
			}

	}
	if($error){
		header("Location: ../viewLecturer.php?result=$error_string");
		exit();
	}else{
		header("Location: ../viewLecturer.php?result=success");
		exit();
	}
	}else{
		header("Location: ../viewLecturer.php");
		exit();
	}
?>