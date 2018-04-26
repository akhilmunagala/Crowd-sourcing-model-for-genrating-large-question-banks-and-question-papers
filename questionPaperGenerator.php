<?php
	session_start();
	if(isset($_POST['adminGenerate']) && isset($_SESSION['a_id']) || isset($_GET['result'])){
?>


<!DOCTYPE html>
<html>
<head>
	<title>Generate Question Paper - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/paperGenerator.css">

	

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
	<p><a href="admin_dashboard.php">&lt;back</a></p>
	
	
	<div class="options">
		<form method="POST" action="./includes/questionPaperGenerator.php">


			<div class="form-row">

				  	<div class="col-md-12 mb-3">

				    	<label for="course">Course</label>
				     	 	<select class="custom-select" id="course" name="course" required>
						      <option value="">--Select--</option>
						      <option value="cse">CSE</option>
						      <option value="civil">Civil</option>
						      <option value="eee">EEE</option>
						      <option value="ece">ECE</option>
						      <option value="mech">MECH</option>
						      
					    	</select>

				    </div>
				</div>

			<div class="form-row">

				  	<div class="col-md-12 mb-3">

				    	<label for="year">Select Academic year:</label>
				     	 	<select class="custom-select" id="year" name="year" required>
						      <option value="">--Select--</option>
						      <option value="1-1">1-1</option>
							  <option value="1-2">1-2</option>
							  <option value="2-1">2-1</option>
							  <option value="2-2">2-2</option>
							  <option value="3-1">3-1</option>
							  <option value="3-2">3-2</option>
							  <option value="4-1">4-1</option>
							  <option value="4-2">4-2</option>
					    	</select>

				    </div>
				</div>

			<div class="form-row">

				  	<div class="col-md-12 mb-3">

				    	<label for="subject">Select Subject:</label>
				     	 	<select class="custom-select" id="subject" name="subject" required>
						      <!-- <option value="">--Select--</option>
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
							  <option value="SE">Software Engineering</option> -->
					    	</select>

				    </div>
				</div>


				<div class="form-row">

				  	<div class="col-md-12 mb-3">

				    	<label for="model">Paper Model:</label>
				     	 	<select class="custom-select" id="model" name="model" required>
						      <option value="">--Select--</option>
						      <option value="r13">Jntuh R13 Model</option>
							  <!-- <option value="r15">Jntuh R15 Model</option> -->
					    	</select>

				    </div>
				</div>

				<div class="form-row">
					<label for="level">Paper Difficulty:</label>
				     	 	<select class="custom-select" id="level" name="level" required>
						      <option value="">---select---</option>
						      <option value="0">Easy</option>
							  <option value="1">Moderate</option>
							  <option value="2">Difficult</option>
					    	</select>
				</div>
				<div class="form-row">
					<div class="col-md-12 mb-3 button">
					<button type="submit" name="adminGeneratePaper" class="btn btn-warning bcustom">Generate Question Paper</button>
					</div>
				</div>
			
		</form>
	</div>
</div>
</body>
<script src="./script/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

//let's create arrays
// for cse
var fo1_cse = [
    {display: "-- select --", value: '' }, 
    {display: 'Linux Programming', value: 'lp' }, 
    {display: "Mobile Computing", value: "mc" }, 
    {display: "Design Patterns", value: "dp" },
    {display: "Data Warehousing and Data Mining", value: "dwdm" },
    {display: "Cloud Computing", value: "cc" },
    {display: "Computer Forensics", value: "cf" }];
    
var fo2_cse = [
	{display: "-- select --", value: '' }, 
    {display: "Adhoc Sensor Networks", value: "asn" }, 
    {display: "Management Science", value: "ms" }, 
    {display: "Semantic Web and Social Networks", value: "swsn"}];
    
    
var th1_cse = [
	{display: "-- select --", value: '' }, 
    {display: "Principles of Programming Languages", value: "ppl" }, 
    {display: "Human Values and Professional Ethics", value: "Hvpe" }, 
    {display: "Intellectual Property Rights", value: "ipr" },
    {display: "Disaster Management", value: "dm" },
    {display: "Software Engineering", value: "se" },
    {display: "Compiler Design", value: "cd" },
    {display: "Operating System", value: "os" },
    {display: "Computer Networks", value: "cn" }];

var th2_cse = [
	{display: "-- select --", value: '' }, 
    {display: "Managerial Economics and Financial Analysis", value: "mefa" }, 
    {display: "Web Technologies", value: "wt" }, 
    {display: "Software Testing Methodologies", value: "stm" },
    {display: "Object Oriented Analysis and Design", value: "ooad" },
    {display: "Information Security", value: "is" },
    {display: "Distributed Systems", value: "ds" }];

var tw1_cse = [
	{display: "-- select --", value: '' }, 
    {display: "Probability and Statistics", value: "ps" }, 
    {display: "Mathematical Foundations of Computer Science", value: "mfcs" }, 
    {display: "Data Structers", value: "das" },
    {display: "Digital Logical Design", value: "dld" },
    {display: "Electronic Devices and Circuits", value: "edc" },
    {display: "Basic Electrical Engineering", value: "bee" }];

var tw2_cse = [
	{display: "-- select --", value: '' }, 
    {display: "Computer Organization", value: "co" }, 
    {display: "Database Management System", value: "dbms" }, 
    {display: "Java Programming", value: "jp" },
    {display: "Environmental Studies", value: "es" },
    {display: "Formal Language and Autometa Theory", value: "flat" },
    {display: "Design and Analysis of Algorithms", value: "daa" }];

// var f1_cse = [
//     {display: "Frozen yogurt", value: "frozen-yogurt" }, 
//     {display: "Booza", value: "booza" }, 
//     {display: "Frozen yogurt", value: "frozen-yogurt" },
//     {display: "Ice milk", value: "ice-milk" }];

// var f2_cse = [
//     {display: "Frozen yogurt", value: "frozen-yogurt" }, 
//     {display: "Booza", value: "booza" }, 
//     {display: "Frozen yogurt", value: "frozen-yogurt" },
//     {display: "Ice milk", value: "ice-milk" }];
//If parent option is changed
$("#course").change(function() {
	$("#year").val('');
	$("#subject").html('');
	$('#year').change(function(){
 var parent = $("#year").val(); //get option value from parent 
        var course = $("#course").val();
       
        if(course == 'cse'){
        	switch(parent){ //using switch compare selected option and populate child
              case '4-1':
                list(fo1_cse);
                break;
              case '4-2':
                list(fo2_cse);
                break;              
              case '3-1':
                list(th1_cse);
                break;  
              case '3-2':
                list(th2_cse);
                break;
              case '2-1':
                list(tw1_cse);
                break; 
              case '2-2':
                list(tw2_cse);
                break; 
              // case '1-1':
              //   list(f1_cse);
              //   break;
              // case '1-2':
              //   list(f2_cse);
              //   break;
            default: //default child option is blank
                $("#subject").html('');  
                break;
           }
        }
      
	});
     
        
});

//function to populate child select box
function list(array_list)
{
    $("#subject").html(""); //reset child options
    $(array_list).each(function (i) { //populate child options 
        $("#subject").append("<option value="+array_list[i].value+">"+array_list[i].display+"</option>");
    });

}
});
</script>

	
</html>



<?php

	}else{
		header("Location: ./admin_dashboard.php");
	}

?>