<?php

	session_start();
	if(isset($_POST['adminGeneratePaper']) && isset($_SESSION['a_id'])){

?>
<!DOCTYPE html>
<html>
<head>
	<title>Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="../css/main.css">
	<link typye="text/css" rel="stylesheet" href="../css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="../css/paper.css">
</head>
<body>
	<div class="container">
	
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
	
		<hr>
		<div class="sec">
			<p class="left">Subject: <strong><?php echo strtoupper($_POST['subject'])?></strong></p>
			<p class="right">Time: <strong>3hrs</strong></p>
		</div>
		<h2 class="center">Part-A</h2>
		<p class="center">Must answer all the questions</p>

<?php
		$error = false;
		$error_string = "";
		include_once "../includes/db.php";
		$subject = $_POST['subject'];
		$difficulty = $_POST['level'];
		// echo $difficulty;

		$two_marks = array();
		$three_marks = array();
		$five_marks = array();

		$j =1;
		if($difficulty ==0 ){
			//two marks
			$sql = "SELECT * FROM questions WHERE marks=2 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql1 = "SELECT * FROM questions WHERE marks=2 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
				
			}else{
				header("Location: ../questionPaperGenerator.php?result=error");
				exit();
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
			}

			shuffle($two_marks);


			//three marks
			$sql = "SELECT * FROM questions WHERE marks=3 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql1 = "SELECT * FROM questions WHERE marks=3 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
			}

			shuffle($three_marks);

			//five marks
			$sql = "SELECT * FROM questions WHERE marks=5 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 6";
			$sql1 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$sql2 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";

			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}
			$result = mysqli_query($conn,$sql2);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}

			shuffle($five_marks);
			
			// echo $two_marks[0]['marks']."<br>";
			// echo $two_marks[1]['question']."<br>";
			// echo $two_marks[2]['question']."<br>";
			// echo $two_marks[3]['question']."<br>";
			// echo $two_marks[4]['question']."<br>";

			for($i =0; $i <5; $i++){
				echo $j.") ".$two_marks[$i]['question']."<span class='right'>[".$two_marks[$i]['marks']."]</span><br>";
				$j++;
				echo $j.") ".$three_marks[$i]['question']."<span class='right'>[".$three_marks[$i]['marks']."]</span><br>";
				$j++;
			}
			?>
			<h2 class="center">Part-B</h2>
		<p class="center">Answer any 5 questions</p>

			<?php
			for($i =0; $i <10; $i++){
				echo $j.") ".$five_marks[$i]['question']."<span class='right'>[".$five_marks[$i]['marks']."]</span><br>";
				$j++;
				// echo $three_marks[$i]['question'].' '.$three_marks[$i]['marks']."<br>";
			}
			

		}elseif($difficulty = 1){
			
			//two marks
			$sql = "SELECT * FROM questions WHERE marks=2 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql1 = "SELECT * FROM questions WHERE marks=2 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
				
			}else{
				header("Location: ../questionPaperGenerator.php?result=error");
				exit();
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
			}

			shuffle($two_marks);


			//three marks
			$sql = "SELECT * FROM questions WHERE marks=3 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql1 = "SELECT * FROM questions WHERE marks=3 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
			}

			shuffle($three_marks);

			//five marks
			$sql = "SELECT * FROM questions WHERE marks=5 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 5";
			$sql1 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql2 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";

			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}
			$result = mysqli_query($conn,$sql2);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}

			shuffle($five_marks);
			
			// echo $two_marks[0]['marks']."<br>";
			// echo $two_marks[1]['question']."<br>";
			// echo $two_marks[2]['question']."<br>";
			// echo $two_marks[3]['question']."<br>";
			// echo $two_marks[4]['question']."<br>";

			for($i =0; $i <5; $i++){
				echo $j.") ".$two_marks[$i]['question']."<span class='right'>[".$two_marks[$i]['marks']."]</span><br>";
				$j++;
				echo $j.") ".$three_marks[$i]['question']."<span class='right'>[".$three_marks[$i]['marks']."]</span><br>";
				$j++;
			}
			?>
			<h2 class="center">Part-B</h2>
		<p class="center">Answer any 5 questions</p>

			<?php
			for($i =0; $i <10; $i++){
				echo $j.") ".$five_marks[$i]['question']."<span class='right'>[".$five_marks[$i]['marks']."]</span><br>";
				$j++;
				// echo $three_marks[$i]['question'].' '.$three_marks[$i]['marks']."<br>";
			}


		}elseif($difficulty =2){
			//two marks
			$sql = "SELECT * FROM questions WHERE marks=2 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$sql1 = "SELECT * FROM questions WHERE marks=2 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
				
			}else{
				header("Location: ../questionPaperGenerator.php?result=error");
				exit();
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$two_marks[] = $row;
				}
			}

			shuffle($two_marks);


			//three marks
			$sql = "SELECT * FROM questions WHERE marks=3 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql1 = "SELECT * FROM questions WHERE marks=3 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";
			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$three_marks[] = $row;
				}
			}

			shuffle($three_marks);

			//five marks
			$sql = "SELECT * FROM questions WHERE marks=5 AND difficulty= 2 AND subject='$subject' ORDER BY RAND() LIMIT 0, 5";
			$sql1 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 1 AND subject='$subject' ORDER BY RAND() LIMIT 0, 3";
			$sql2 = "SELECT * FROM questions WHERE marks=5 AND difficulty= 0 AND subject='$subject' ORDER BY RAND() LIMIT 0, 2";

			$result = mysqli_query($conn,$sql);

			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
				
			}
			$result = mysqli_query($conn,$sql1);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}
			$result = mysqli_query($conn,$sql2);
			if($result){
				while($row = mysqli_fetch_array($result)){
					$five_marks[] = $row;
				}
			}

			shuffle($five_marks);
			
			// echo $two_marks[0]['marks']."<br>";
			// echo $two_marks[1]['question']."<br>";
			// echo $two_marks[2]['question']."<br>";
			// echo $two_marks[3]['question']."<br>";
			// echo $two_marks[4]['question']."<br>";
?>	
	<h2 class="center">Part-B</h2>
		<p class="center">Answer any 5 questions</p>


<?php
			for($i =0; $i <5; $i++){
				echo $two_marks[$i]['question']."<span class='right'>[".$two_marks[$i]['marks']."]</span><br>";
				echo $three_marks[$i]['question']."<span class='right'>[".$three_marks[$i]['marks']."]</span><br>";
			}
			for($i =0; $i <10; $i++){
				echo $five_marks[$i]['question']."<span class='right'>[".$five_marks[$i]['marks']."]</span><br>";
				// echo $three_marks[$i]['question'].' '.$three_marks[$i]['marks']."<br>";
			}


		}

		?>

		<div class="qButtons">
			<a href="javascript:history.go(0)" class="orange">Re-Generate</a>
			<a href="#" onClick="window.print();return false;" class="green">Print Paper</a>
		</div>

		</div>
</body>

</html>
<?php
		
	}else{
		header("Location: ../questionPaperGenerator.php?result=1");
		exit();
	}
?>