<?php

	session_start();
	include_once '../includes/db.php';
	$id;
	if(isset($_SESSION['id'])){
		$id= $_SESSION['id'];
		$sp = $_SESSION['sp'];
	}else{
		header("Location: ../login.php");
		exit();
	}

	$file = './temp.tsv';
	$handle =  fopen($file, 'w') or die('cannot open file'.$file);
	$data = "S.No\tQuestion\tMarks\tKeyword\tDifficulty\n";
	fwrite($handle,$data);
	$qb = "./questions.tsv";
	$handle1 = fopen($qb,'r')or die('cannot open file'.$qb);
	$linecount = 0;
	while(!feof($handle1)){
	  $line = fgets($handle1);
	  $linecount++;
	}
	$linecount--;

if(isset($_POST['questions'])) {
	$error = false;
	$error_string = "";
	$result = "";
	//submit 2 marks questions
	// echo "two marks questions<br><br>";
	$submitted_by = mysqli_real_escape_string($conn,$id);
	$marks = 2;
	for($i = 0; $i <5; $i++){
		
		$name = "two".($i+1);
		//check if inputs are empty
		if($_POST['questions'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST['keywords'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST[$name] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		
		$question = mysqli_real_escape_string($conn,$_POST['questions'][$i]);
		$keyword = mysqli_real_escape_string($conn,$_POST['keywords'][$i]);
		$difficulty = mysqli_real_escape_string($conn,$_POST[$name]);
		$subject = mysqli_real_escape_string($conn,$_SESSION['sp']);
		
	  		$data = ($linecount)."\t".$question."\t".$keyword."\t".$marks."\t".$difficulty."\n";
			fwrite($handle, $data);
			$linecount++;
	}
	//submit 3marks questions
	// echo "<br><br>three marks questions<br><br>";
	$i2 =0;
	$marks = 3;
	for($i = 5; $i <10; $i++){
		$name = "three".($i2+1);
		// echo $_POST['questions'][$i].' '.$_POST['keywords'][$i].' '.$_POST[$name].'<br>';
		//check if inputs are empty
		if($_POST['questions'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST['keywords'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST[$name] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		
		$question = mysqli_real_escape_string($conn,$_POST['questions'][$i]);
		$keyword = mysqli_real_escape_string($conn,$_POST['keywords'][$i]);
		$difficulty = mysqli_real_escape_string($conn,$_POST[$name]);

	  		$data = ($linecount)."\t".$question."\t".$keyword."\t".$marks."\t".$difficulty."\n";
			fwrite($handle, $data);
	  	
		$i2++;
		$linecount++;
	}
	//submit 5 marks questions
	// echo "<br><br>five marks questions<br><br>";
	$i3 =0;
	$marks = 5;
	for($i = 10; $i <20; $i++){
		$name = "five".($i3+1);
		// echo $_POST['questions'][$i].' '.$_POST['keywords'][$i].' '.$_POST[$name].'<br>';
		//check if inputs are empty
		if($_POST['questions'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST['keywords'][$i] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		if($_POST[$name] == ""){
			$error = true;
			$error_string .= "Inputs cannot be empty";
			header("Location: ../submitquestions.php?result=$error_string");
			exit();
		}
		
		$question = mysqli_real_escape_string($conn,$_POST['questions'][$i]);
		$keyword = mysqli_real_escape_string($conn,$_POST['keywords'][$i]);
		$difficulty = mysqli_real_escape_string($conn,$_POST[$name]);
		
	  		$data = ($linecount)."\t".$question."\t".$keyword."\t".$marks."\t".$difficulty."\n";
			fwrite($handle, $data);
	  	
		$i3++;
		$linecount++;
	}

	//similarity checker
	$command = "python similarity_checker.py";
	$output = shell_exec($command);
	
	if($output == ""){
		$error = true;
		$error_string .= "Error while performing similarity checking";
	}
	else{
		//uploading the remaining data to database

	$handle = file_get_contents("temp2.tsv");
	$file = explode("\n",$handle);


	foreach ($file as $key => $value) {
		
		$ex = explode("\t", $file[$key]);
		
			if(!empty($ex[0])){

				// echo "Insert into questions() values($ex[0],$ex[1],$ex[2],$ex[3])<br>";
				$sql = "INSERT INTO questions(submitted_by,question,subject,keyword,marks,difficulty) VALUES ('$id','$ex[0]','$sp','$ex[1]','$ex[2]','$ex[3]')";
				$result = mysqli_query($conn,$sql);
			}
			
	}

	if($result <0){
		$error = true;
		$error_string .= "error while uploading data";
	}
}
	
	if(!$error){
		header("Location: ../submitquestions.php?result=success");
		fclose($handle);
	}

}else{
 	header("Location: ../submitQuestions.php");
 	exit();
 }

?>