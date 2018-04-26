<?php 
	if(isset($_POST['submitQuestions']) || isset($_GET['result'])){
		session_start();
		include_once './includes/db.php';
		$id = $_SESSION['id']; 

		//connecting to database and getting keywords
		$sp = strtolower($_SESSION['sp']);
		$sp .="_keywords";
		$sql = "SELECT * FROM $sp";
      	$result = mysqli_query($conn,$sql);
      	$result_check = mysqli_num_rows($result);
      	if($result_check < 1){
      		header("Location: ./dashboard.php?result=Threre are no keywords at the moment please contact admin.");
      	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Submit Questions - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/submitquestions.css">
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
		<h1>Submit Questions for <?php echo $_SESSION['sp'] ?></h1>
		
		<hr>
<p><a href="dashboard.php">&lt;back</a></p>
		<div id="error">
					<?php 
					
						if(isset($_GET['result'])){
							if($_GET['result'] != 'success'){
								echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
							}
							else{
								echo '<div class="alert alert-success" role="alert"><h2>Questions submitted sucessfully!</h2></div>';
							}
							
						}

					?>
		</div>

		<div class="input-wrapper">
			<div class="twoMarks">
				<h2>2 Marks Questions:</h2>
				<form name="form" method="POST" action="./database/question_process.php">
					<!-- two marks inputs -->
					<!-- two marks input 1 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">1</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>

					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>

						<input type="radio" name="two1" id="1e1" value="0">
						<label for="1e1" id="leasy">Easy</label>
						<input type="radio" name="two1" id="1e2" value="1">
						<label for="1e2" id="lmoderate">Moderate</label>
						<input type="radio" name="two1" id="1e3" value="2">
						<label for="1e3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- two marks input 2 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">2</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      	mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
					
						<input type="radio" name="two2" id="2e1" value="0">
						<label for="2e1" id="leasy">Easy</label>
						<input type="radio" name="two2" id="2e2" value="1">
						<label for="2e2" id="lmoderate">Moderate</label>
						<input type="radio" name="two2" id="2e3" value="2">
						<label for="2e3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- two marks input 3 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">3</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]"required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="two3" id="3e1" value="0">
						<label for="3e1" id="leasy">Easy</label>
						<input type="radio" name="two3" id="3e2" value="1">
						<label for="3e2" id="lmoderate">Moderate</label>
						<input type="radio" name="two3" id="3e3" value="2">
						<label for="3e3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- two marks input 4 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">4</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[] required" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="two4" id="4e1" value="0">
						<label for="4e1" id="leasy">Easy</label>
						<input type="radio" name="two4" id="4e2" value="1">
						<label for="4e2" id="lmoderate">Moderate</label>
						<input type="radio" name="two4" id="4e3" value="2">
						<label for="4e3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- two marks input 5 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">5</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]"  required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="two5" id="5e1" value="0">
						<label for="5e1" id="leasy" required>Easy</label>
						<input type="radio" name="two5" id="5e2" value="1">
						<label for="5e2" id="lmoderate">Moderate</label>
						<input type="radio" name="two5" id="5e3" value="2">
						<label for="5e3" id="ldifficult" >Difficult</label>
					
				</div>
				
				<hr>
				<h2>3 Marks Questions:</h2>
				
					<!-- three marks inputs -->
					<!-- three marks input 1 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">1</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="three1" id="1m1" value="0">
						<label for="1m1" id="leasy">Easy</label>
						<input type="radio" name="three1" id="1m2" value="1">
						<label for="1m2" id="lmoderate">Moderate</label>
						<input type="radio" name="three1" id="1m3" value="2">
						<label for="1m3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- three marks input 2 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">2</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="three2" id="2m1" value="0">
						<label for="2m1" id="leasy">Easy</label>
						<input type="radio" name="three2" id="2m2" value="1">
						<label for="2m2" id="lmoderate">Moderate</label>
						<input type="radio" name="three2" id="2m3" value="2">
						<label for="2m3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- three marks input 3 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">3</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="three3" id="3m1" value="0">
						<label for="3m1" id="leasy">Easy</label>
						<input type="radio" name="three3" id="3m2" value="1">
						<label for="3m2" id="lmoderate">Moderate</label>
						<input type="radio" name="three3" id="3m3" value="2">
						<label for="3m3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- three marks input 4 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">4</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="three4" id="4m1" value="0">
						<label for="4m1" id="leasy">Easy</label>
						<input type="radio" name="three4" id="4m2" value="1">
						<label for="4m2" id="lmoderate">Moderate</label>
						<input type="radio" name="three4" id="4m3" value="2">
						<label for="4m3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- three marks input 5 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">5</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="three5" id="5m1" value="0">
						<label for="5m1" id="leasy">Easy</label>
						<input type="radio" name="three5" id="5m2" value="1">
						<label for="5m2" id="lmoderate">Moderate</label>
						<input type="radio" name="three5" id="5m3" value="2">
						<label for="5m3" id="ldifficult" >Difficult</label>
					
				</div>
				
				<hr>
				<h2>5 marks questions:</h2>
					<!-- five marks inputs -->
					<!-- five marks input 1 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">1</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five1" id="1l1" value="0">
						<label for="1l1" id="leasy">Easy</label>
						<input type="radio" name="five1" id="1l2" value="1">
						<label for="1l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five1" id="1l3" value="2">
						<label for="1l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 2 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">2</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five2" id="2l1" value="0">
						<label for="2l1" id="leasy">Easy</label>
						<input type="radio" name="five2" id="2l2" value="1">
						<label for="2l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five2" id="2l3" value="2">
						<label for="2l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 3 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">3</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five3" id="3l1" value="0">
						<label for="3l1" id="leasy">Easy</label>
						<input type="radio" name="five3" id="3l2" value="1">
						<label for="3l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five3" id="3l3" value="2">
						<label for="3l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 4 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">4</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five4" id="4l1" value="0">
						<label for="4l1" id="leasy">Easy</label>
						<input type="radio" name="five4" id="4l2" value="1">
						<label for="4l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five4" id="4l3" value="2">
						<label for="4l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 5 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">5</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five5" id="5l1" value="0">
						<label for="5l1" id="leasy">Easy</label>
						<input type="radio" name="five5" id="5l2" value="1">
						<label for="5l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five5" id="5l3" value="2">
						<label for="5l3" id="ldifficult" >Difficult</label>
					
				</div>
					<!-- five marks input 6 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">6</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five6" id="6l1" value="0" required>
						<label for="6l1" id="leasy">Easy</label>
						<input type="radio" name="five6" id="6l2" value="1" required>
						<label for="6l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five6" id="6l3" value="2" required>
						<label for="6l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 7 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">7</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five7" id="7l1" value="0" required>
						<label for="7l1" id="leasy">Easy</label>
						<input type="radio" name="five7" id="7l2" value="1" required>
						<label for="7l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five7" id="7l3" value="2" required>
						<label for="7l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 8 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">8</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five8" id="8l1" value="0" required>
						<label for="8l1" id="leasy">Easy</label>
						<input type="radio" name="five8" id="8l2" value="1" required>
						<label for="8l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five8" id="8l3" value="2" required>
						<label for="8l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 9 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">9</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five9" id="9l1" value="0" required>
						<label for="9l1" id="leasy">Easy</label>
						<input type="radio" name="five9" id="9l2" value="1" required>
						<label for="9l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five9" id="9l3" value="2" required>
						<label for="9l3" id="ldifficult" >Difficult</label>
					
				</div>
				<!-- five marks input 10 -->
				<div class="input">
					<div class="col-md-7 input-group mb-3 pad">
					  <div class="input-group-prepend">
					    <span class="input-group-text">10</span>
					  </div>
					  <input type="text" class="form-control" placeholder="Enter your question here" aria-describedby="basic-addon1" name="questions[]" required>
					</div>
					<div class="col-md-2 input-group mb-3 pad">
					  <select class="custom-select" id="keyword" name="keywords[]" required>
						      <option value="">select keyword</option>
						      <?php 
						      mysqli_data_seek($result,0);
						      	while ($row = mysqli_fetch_assoc($result)) {
						      		echo '<option>'.$row['keywords'].'</option>';
						      	}
						      ?>
					   </select>
					</div>
						<input type="radio" name="five10" id="10l1" value="0">
						<label for="10l1" id="leasy">Easy</label>
						<input type="radio" name="five10" id="10l2" value="1">
						<label for="10l2" id="lmoderate">Moderate</label>
						<input type="radio" name="five10" id="10l3" value="2">
						<label for="10l3" id="ldifficult" >Difficult</label>
					
				</div>
				<div class="button">
					<button type="submit" name="submitquestions">Submit</button>
				</div>
				</form>

			</div>
			
		</div>
			
		
	</div>
	<script type="text/javascript">
		
		if (!$("input[name='two1']:checked").val()) {
		   alert('Nothing is checked!');
		}

	</script>
</body>
</html>




<?php
	}else{
		header("Location: ./login.php");
	} 
?>