<?php

if(isset($_POST['submit'])){

	include_once 'db.php';
	// print_r($_REQUEST);
	// print_r($_FILES['proof']['name']);

	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$mnumber = mysqli_real_escape_string($conn,$_POST['mnumber']);
	$dob = mysqli_real_escape_string($conn,$_POST['dob']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$inst = mysqli_real_escape_string($conn,$_POST['inst']);
	$desg = mysqli_real_escape_string($conn,$_POST['desg']);
	$special = mysqli_real_escape_string($conn,$_POST['special']);
	$experience = mysqli_real_escape_string($conn,$_POST['experience']);
	$state = mysqli_real_escape_string($conn,$_POST['state']);
	$city = mysqli_real_escape_string($conn,$_POST['city']);
	$proof = mysqli_real_escape_string($conn,$_FILES['proof']['name']);
	$upload_location = "../proofs/";
	//Form validation
	$error = false;
	$error_string = "";
	// checking fields are empty or not
	if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($mnumber) || empty($dob) || empty($gender) || empty($inst) || empty($desg) || empty($special) || empty($experience) || empty($state) || empty($city) || empty($proof)){
		$error = true;
		$error_string .= "Inputs cannot be empty<br>";
	}else{

		// checking all the form values

		// name fields

		if(!preg_match("/^[a-zA-Z_ -]*$/", $fname) || !preg_match("/^[a-zA-Z_ -]*$/", $lname)){
			$error = true;
			$error_string .= "Special characters are not allowed in name fields<br>";
			echo "special characters are not allowed in name<br>";
		}else{
			//name length verification
			if(strlen($fname) <2 || strlen($lname) <2 ){
				$error = true;
				$error_string .= "Invalid Name<br>";
			}
		}

		//email validation
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = true;
			$error_string .= "Email id is invalid<br>";
		}else{
			//checking user on database if exists
				$sql = "SELECT * FROM login_details WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if($resultCheck > 0){
					$error = true;
					$error_string .= "$email already registerd<br>";
				}
		}

		//mobile number verification

		if(!preg_match("/^[0-9]*$/", $mnumber)){
			$error = true;
			$error_string .= "Invalid mobile number<br>";
		}


		// date of birth validation

		if(preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $dob, $matches)) 
		  {
		   if(!checkdate($matches[2], $matches[3], $matches[1]))
		    { 
		     	$error = true;
		     	$error_string .= "Invalid date of birth<br>";
		    }
		  }

		//experience validation

		if(!preg_match("/^[0-9]*$/", $experience)){
			$error = true;
			$error_string .= "Invalid experience<br>";
		}


		   //string length valuation
		  if(strlen($inst) < 2){
		  	$error = true;
		  	$error_string .= "Invalid institute name<br>";
		  }
		   if(strlen($state) < 2){
		  	$error = true;
		  	$error_string .= "Invalid state<br>";
		  }
		  if(strlen($city) < 2){
		  	$error = true;
		  	$error_string .= "Invalid city<br>";
		  }

		  //proof validation.
		  if(empty($_FILES)){

		  	$error = true;
		  	$error_string .= "Proof must be uploaded<br>";

		  }else{
		  	$file_name = $_FILES['proof']['name'];
			$file_size =$_FILES['proof']['size'];
			$file_tmp =$_FILES['proof']['tmp_name'];
			$file_type=$_FILES['proof']['type'];

			// checking file type
			$temp= explode('.',$_FILES['proof']['name']);
			$file_ext = strtolower(end($temp));
			$expensions= array("jpeg","jpg","png");

			if(in_array($file_ext,$expensions)=== false){
				$error = true;
				$error_string .= $file_ext." extension not allowed, please choose a JPEG,JPG or PNG file.<br>";
		      }else{
		      	//checking file size
		      	if($file_size != 0 && $file_size >= 1000000){
		      		$error = true;
		      		$error_string .= "File size cannot be more than 1MB<br>";
		      		echo "File size cannot be more than 1MB<br>";
		      	}
		      	else{
		      		//moving file to server

		      		if (!file_exists($upload_location.$email)) {
					    mkdir($upload_location.$email, 0777, true);
					}
					    $upload_location .= $email.'/';
					    $upload_location .= $file_name; 
					    

			      		if(!move_uploaded_file($file_tmp, $upload_location)){
			      			$error = true;
			      			$error_string .= "Error while uploading file<br>";
			      		}
			      		//removing first letter in upload_location string
			      		$upload_location = substr($upload_location, 1);
					
		      		
		      	}
		      }
		  }// end of else proof

		  //hashing password
		  if(strlen($password) < 4){
		  	$error = true;
		  	$error_string .= "Password must contain atleast 4 characters<br>";
		  }else{
		  	 $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		  }
		 

		  //checking for error and throwing if any exists

		  if($error == true){
		  	header("Location: ../signup.php?result=$error_string");
		  	exit();
		  }else{//uploading data to database
		  	
		  	$sql = "INSERT INTO login_details(fname,lname,email,password,mnumber,dob,gender,noi,dsg,sp,experience,state,city,proof,status) VALUES ('$fname','$lname','$email','$hashedPwd','$mnumber','$dob','$gender','$inst','$desg','$special','$experience','$state','$city','$upload_location',0)";
		  	$result = mysqli_query($conn,$sql);
		  	if($result > 0){
		  		
		  		header("Location: ./sendmail.php?email=$email");

		  	}
		  }


		

	}//end of else
		 

}//end of if
elseif (isset($_GET['result'])) {
	if(isset($_GET['result']) == "success"){
		  			header("Location: ../signup.php?result=success");
		  			exit();
		  		}else{
		  			$error_string .= "error while sending email<br>";
		  			header("Location ../signup.php?result=$error_string");
		  			exit();
		  		}
}

else{
	header("Location: ../signup.php");
	exit();
}