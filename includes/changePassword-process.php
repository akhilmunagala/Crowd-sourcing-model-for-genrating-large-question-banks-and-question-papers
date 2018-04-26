<?php
	session_start();
	if(isset($_POST['submit']) && isset($_SESSION['id'])){
		include 'db.php';
		$error = false;
		$error_string ="";
		$current = mysqli_real_escape_string($conn,$_POST['cpassword']);
		$npass = mysqli_real_escape_string($conn,$_POST['npassword']);
		$rpass = mysqli_real_escape_string($conn,$_POST['rpassword']);
		$id = $_SESSION['id'];

		$sql = "SELECT * FROM login_details WHERE id='$id'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check < 1){
			$error = true;
			$error_string .= "error while fetching data.<br>";
			header("Location: ../changePassword.php?result=$error_string");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				//dehashing password
				$hashedPwdCheck = password_verify($current,$row['password']);
				
				if($hashedPwdCheck == false){

					$error = true;
					$error_string .= "Invalid Current Password<br>";


				}elseif($hashedPwdCheck == true){
					$hashedPwd = password_hash($npass, PASSWORD_DEFAULT);
					$sql = "UPDATE login_details set password = '$hashedPwd' WHERE id = '$id'";
					$result = mysqli_query($conn,$sql);
					

					if(!result){
						$error = true;
						$error_string .= "error while updating data.<br>";
					}
				}
			}
		}

		if($error){
			header("Location: ../changePassword.php?result=$error_string");
			exit();
		}else{
			header("Location: ../changePassword.php?result=success");
			exit();
		}


	}else{
		header("Location: ../changePassword.php");
	}

?>