<!DOCTYPE html>
<html>
<head>
	<title>Signup - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/login.css">
	<link typye="text/css" rel="stylesheet" href="./css/signup.css">
</head>
<body>


	<div class="container">
		<a href="index.php" class="hredirect">
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
		<div class="signup-container">
			<form class="needs-validation" method="post" action="./includes/signup-process.php" enctype="multipart/form-data" novalidate>
				<div id="error">
					<?php 
					
						if(isset($_GET['result'])){
							if($_GET['result'] != 'success'){
								echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
							}
							else{
								echo '<div class="alert alert-success" role="alert"><h2>Registration was successfull!</h2><p>You can access your account, once admin accepts your request.</p></div>';
							}
							
						}

					?>
				</div>
				  <div class="form-row">
				    <div class="col-md-6 mb-3">
				      <label for="fname">First name</label>
				      <input type="text" class="form-control" id="fname" placeholder="First name" name="fname" required>
				      
				    </div>
				    <div class="col-md-6 mb-3">
				      <label for="lname">Last name</label>
				      <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" required>
				     
				    </div>
				  </div>

				  <div class="form-row">
				  	 <div class="col-md-12 mb-3">
				      <label for="email">Email Id</label>
				      <input type="email" class="form-control" id="email" placeholder="Email Id"  name="email" required>
				      
				   	 </div>
				  </div>

				  <div class="form-row">
				    <div class="col-md-6 mb-3">
				      <label for="password">Password</label>
				      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
				      
				    </div>
				    <div class="col-md-6 mb-3">
				      <label for="rpassword">Re-enter Password</label>
				      <input type="password" class="form-control" id="rpassword" placeholder="Re-enter Password" name="rpassword" required>
				     
				    </div>
				  </div>

				  <div class="form-row">

				    <div class="col-md-6 mb-3">
				    	<label for="mnumber">Mobile Number</label>
					    <div class="input-group">
					      <div class="input-group-prepend">
					    	<span class="input-group-text" id="basic-addon1">+91</span>
					  		</div>
					      <input type="text" class="form-control" id="mnumber" placeholder="Mobile Number" name="mnumber" required>
					  </div>
				      
				    </div>
				    <div class="col-md-6 mb-3">
				      <label for="dob">Date of Birth</label>
				      <input type="date" class="form-control" id="dob" name="dob" required>
				     
				    </div>
				  </div>


				  <div class="form-row">

				  	<div class="col-md-6 mb-3">

				    	<label for="gender">Gender</label>
				     	 	<select class="custom-select" id="gender" name="gender" required>
						      <option value="">--Select--</option>
						      <option value="male">Male</option>
						      <option value="female">Female</option>
					    	</select>

				    </div>

				    <div class="col-md-6 mb-3">
				    	<label for="inst">Name of Institute</label>
				     	<input type="text" class="form-control" id="inst" placeholder="Name of Institute" name="inst" required>
				    </div>
				    
				  </div>

				  <div class="form-row">
				  	
				  	 <div class="form-group col-md-12">
				  	 	<label for="desg">Designation</label>
					    <select class="custom-select" id="desg" name="desg" required>
					      <option value="">--Select--</option>
					      <option value="Prof">Professor</option>
					      <option value="AsstProf">Asst-Professor</option>
					    </select>
					    
					 </div>
				  </div>

				   <div class="form-row">
				  	
				  	 <div class="form-group col-md-6">
				  	 	<label for="special">Specialization</label>
					    <select class="custom-select" id="special" name="special" required>
					      <option value="">--Select Subject--</option>
					      <option value="CC">Cloud Computing</option>
						  <option value="CD">Compiler Design</option>
						  <option value="CF">Computer Forensics</option>
						  <option value="CN">Computer Network</option>
						  <option value="DP">Design Patterns</option>
						  <option value="DWDM">Data Warehousing and Data Mining</option>
						  <option value="IPR">Intellectual Property Rights</option>
						  <option value="LP">Linux Programming</option>
						  <option value="MC">Mobile Computing</option>
						  <option value="OS">Operating System</option>
						  <option value="PPL">Principles of Programming Languages</option>
						  <option value="SE">Software Engineering</option>
					    </select>
					 </div>

					<div class="col-md-6 mb-3">
				      <label for="experience">Experience</label>
				      <input type="text" class="form-control" id="experience" placeholder="Enter your experience" name="experience" required>
				      
				    </div>

				  </div>


				  <div class="form-row">
				    <div class="col-md-6 mb-3">
				      <label for="state">State</label>
				      <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" required>
				      
				    </div>
				    <div class="col-md-6 mb-3">
				      <label for="city">City</label>
				      <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
				    </div>
				  </div>

				  <div class="form-row">

				  	<div class="input-group mb-3">
				  		<div class="col-md-12 padlr5">
				  		<label for="proof">Upload proof for Authentication.</label>
						  <div class="custom-file">
						    <input type="file" class="custom-file-input" id="proof" name="proof">
						    <label class="custom-file-label" for="proof" id="upload-file-info" name="proof">Choose file</label>
						    <p class="notification"><span class="red">*</span>Only JPEG,JPG or PNG files with size less than 1MB are only accepted.</p>
						  </div>
						</div>	
						</div>
				  </div>

				  <button class="btn btn-warning sbtn bcustom" type="submit" name="submit">Singup</button>
				</form>
				<p class="right pad5">Already a member? <a href="login.php">Login here</a></p>
		</div>
  
</body>
        <!-- importing jquery library -->
        <script src="./script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript">

        	$('input:file').change(
			    function(e){
			       $('#upload-file-info').html(e.target.files[0].name);
			    });

        	
        	$("form").submit(function (e){
        		// e.preventDefault();
        		var error = "";
        		
        		

        		if($("#fname").val() == ""){
        			error += "First Name is required.<br>";
        		}
        		if($("#lname").val() == ""){
        			error += "Last Name is required.<br>";
        		}
        		if($("#email").val() == "") {
        			error += "email is required.<br>";
        		}

        		if($("#password").val() == "") {
        			error += "password cannot be empty.<br>";
        		}

        		if($("#password").val() != $("#rpassword").val()) {
        			error += "Passwords do not match.<br>";
        		}
        		if($("#mnumber").val() == "") {
        			error += "Mobile number is required.<br>";
        		}
        		if($("#dob").val() == "") {
        			error += "Date of birth is required.<br>";
        		}
        		if($("#inst").val() == "") {
        			error += "Institute name is required.<br>";
        		}
        		if($("#desg").val() == "") {
        			error += "Designation must be selected.<br>";
        		}
        		if($("#gender").val() == "") {
        			error += "gender must be selected<br>";
        		}
        		if($("#special").val() == "") {
        			error += "Specialization is required.<br>";
        		}
        		if($("#experience").val() == "") {
        			error += "Experience is required.<br>";
        		}
        		if($("#state").val() == "") {
        			error += "State is required.<br>";
        		}
        		if($("#city").val() == "") {
        			error += "City is required.<br>";
        		}
        		if($("#proof").val() == "") {
        			error += "Proof must be uploaded.<br>";
        		}


        		if(error != ""){
        			$("#error").html('<div class="alert alert-danger" role="alert"><strong>There were error(s):</strong><br>'+error+'</div>');
        			return false;
        		}else{
        			// $("form").unbind("submit").submit();
        			return true;
        		}
        		
        	});



        </script>

</html>