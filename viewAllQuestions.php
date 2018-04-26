<?php 

if(isset($_POST['adminView'])){
	session_start();
	include_once "./includes/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Questions - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/dashboard.css">
	<link typye="text/css" rel="stylesheet" href="./css/viewquestions.css">
</head>
<body>
	<div class="container">
		<a href="./index.php">
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

	<div class="heading">
		<h2>LIST OF ALL QUESTIONS</h2>
	</div>
	<div class="table">
		<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Submitted By</th>
      <th scope="col">Question</th>
      <th scope="col">Subject</th>
      <th scope="col">Keyword</th>
      <th scope="col">Marks</th>
      <th scope="col">Difficulty</th>
    </tr>
  </thead>
  <tbody>

<?php 

	$sql = "SELECT * FROM questions";
	$result = mysqli_query($conn,$sql);
	
	if(!$result){
		echo "<h2>You've not submitted any questions yet!</h2>";
	}else{
		$i =1;	
		while($row = mysqli_fetch_array($result))
		{
			
		?>
	 <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['submitted_by']?></td>
      <td><?php echo $row['question']?></td>
      <td><?php echo $row['subject']?></td>
      <td><?php echo $row['keyword']?></td>
      <td><?php echo $row['marks']?></td>
      <td><?php 

      	if($row['difficulty'] == 0){
      		echo "Easy";
      	}
      	elseif ($row['difficulty'] == 1) {
      		echo "Moderate";
      	}else{
      		echo "High";
      	}
      ?></td>
    </tr>
<?php
		$i++;
	}//while
}//else
?>
  </tbody>
</table>

	</div>
</div>
</body>
</html>



<?php 
}else{
	header("Location: ./admin.php");
}
?>