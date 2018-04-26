<?php

session_start();

if(isset($_POST['submit'])){
	include 'db.php';

	$error = false;
	$error_string = "";
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	//checking for errors
	if(empty($email) || empty($password)){
		$error = true;
		$error_string .= "Inputs cannot be empty<br>";
		
	}else{
		$sql = "SELECT * FROM login_details WHERE email = '$email'";
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

				}
				elseif($hashedPwdCheck == true){

					if($row['status'] == 0){
						$error = true;
						$error_string .= "User is not approved yet! Please contact administrator<br>";
					}else{
						//login user
						$_SESSION['id'] = $row['id'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['fname'] = $row['fname'];
						$_SESSION['lname'] = $row['lname'];
						$_SESSION['gender'] = $row['gender'];
						$_SESSION['sp'] = $row['sp'];
					}
					
				}
			}
		}
	}
	if($error == true){
		header("Location: ../login.php?login=$error_string");
		exit();
	}else{
		header("Location: ../dashboard.php");
		exit();
	}


}else{
	header("Location: ../login.php?login=error");
	exit();
}