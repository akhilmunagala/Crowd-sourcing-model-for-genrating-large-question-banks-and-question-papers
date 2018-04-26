<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if(isset($_GET['email'])){

		include_once "./db.php";
		$email = $_GET['email'];
		// echo $email;
		$error = false;
		$error_string = "";

		$sql = "SELECT * FROM login_details WHERE email='$email'";
		$result = mysqli_query($conn,$sql);

		if(!$result){
		header("Location: ./signup-process.php?result=error");
		exit();
		}else{
			while($row = mysqli_fetch_array($result)){

				$name = $row['fname'].' '.$row['lname'];
				$id = $row['id'];
				$proof = 'localhost/php/majorproject'.$row['proof'];
				// echo $proof;

				require '../vendor/autoload.php';
							
							//admin emial
							$to = "akhil.munagala2@gmail.com";

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

									//attachment
									// $mail->AddAttachment($proof, 'proof');
									//Content
									$body = '<h1>Request for account activation: </h1>
									<p>Name: '.$name.'</p>
									<p>Proof: <a href='."$proof".'>click here</a></p>
									<form method="POST" action="localhost/php/majorproject/includes/approve.php">
									<button type="submit" name="approve" value="'.$id.'">Approve</button>
									</form>';
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'Account activation request - Question Paper Generator';
									$mail->Body    = $body;
									$mail->AltBody = strip_tags($body);

									$mail->send();
									
							} catch (Exception $e) {
									$error = true;
									$error_string .= "Error while sending mail<br>";
							}

			}
		}
		if($error){
			header("Location: ./signup-process.php?result=$error_string");
			exit();
		}else{
			header("Location: ./signup-process.php?result=success");
			exit();
		}

	}else{
		
	}

?>