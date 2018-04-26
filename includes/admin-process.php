<?php

session_start();

if(isset($_POST['adminSubmit'])){
	include 'db.php';

	$error = false;
	$error_string = "";
	$user = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//checking for errors
	if(empty($user) || empty($password)){
		$error = true;
		$error_string .= "Inputs cannot be empty<br>";
		
	}else{
		$sql = "SELECT * FROM admin WHERE user = '$user'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check < 1){
			$error = true;
			$error_string .= "User does not exist<br>";
		}else{
			if($row = mysqli_fetch_assoc($result)){
				//dehashing password
				$hashedPwdCheck = password_verify($password,$row['password']);
				
				if($hashedPwdCheck == false){

					$error = true;
					$error_string .= "Invalid Password<br>";

				}elseif($hashedPwdCheck == true){
					//login user
					$_SESSION['a_id'] = $row['id'];
					$_SESSION['user'] = $row['user'];
				}
			}
		}
	}
	if($error == true){
		header("Location: ../admin.php?login=$error_string");
		exit();
	}else{
		header("Location: ../admin_dashboard.php");
		exit();
	}


}else{
	header("Location: ../admin.php?login=error");
	exit();
}