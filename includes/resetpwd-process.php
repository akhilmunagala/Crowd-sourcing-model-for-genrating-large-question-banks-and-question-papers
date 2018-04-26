<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){

	include 'db.php';
	include 'pwdGenerator.php';
	$error = false;
	$error_string = "";
	$pass ="";
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	if(empty($_POST['email'])){
		$error = true;
		$error_string .= "Input cannot be empty<br>";
	}else{

		$sql = "SELECT * FROM login_details WHERE email = '$email'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);

		if($result_check < 1){

			$error = true;
			$error_string .= "User does not exist<br>";

		}else{
			//generating password
					$password = randomPassword();

					//hashing password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					
					//updating password in database
					$sql = "UPDATE login_details SET password = '$hashedPwd' WHERE email = '$email'";
					$result = mysqli_query($conn,$sql);

					if(!$result){
						$error = true;
						$error_string .= "Error while updating password<br>";
					}else{
						//sending email
						// Import PHPMailer classes into the global namespace
						// These must be at the top of your script, not inside a function
						

						//Load composer's autoloader
						require '../vendor/autoload.php';
						
							$to = $email;

							$mail = new PHPMailer(true);  // Passing `true` enables exceptions

							try {
									//Server settings
									$mail->SMTPDebug =0;                                 // Enable verbose debug output
									$mail->isSMTP();                                      // Set mailer to use SMTP
									$mail->Host = 'undauntedwebservices.com';  // Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               // Enable SMTP authentication
									$mail->Username = 'contact@undauntedwebservices.com';                 // SMTP username
									$mail->Password = 'Admin@Akhil1';                           // SMTP password
									$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
									$mail->Port = 465;                                    // TCP port to connect to

									//Recipients
									$mail->setFrom('contact@undauntedwebservices.com');
									$mail->addAddress($to);
									//Content
									$body = '<h1>Password reset successful!</h1><br><p>Your new password: '.$password.'</p>';
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Updated Password - Question Paper Generator';
									$mail->Body    = $body;
									$mail->AltBody = strip_tags($body);

									$mail->send();
									
							} catch (Exception $e) {
									$error = true;
									$error_string .= "Error while sending mail<br>";
							}

						
					}
		}
		
	}

	if($error == true){
		header("Location: ../forgot.php?result=$error_string");
		exit();
	}else{
		header("Location: ../forgot.php?result=success");
		exit();
	}

}

?>