<?php
	session_start();
	if(isset($_SESSION['a_id'])){
		include './includes/db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Notifications - Question Paper Generator</title>
	<link typye="text/css" rel="stylesheet" href="./css/main.css">
	<link typye="text/css" rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
	<link typye="text/css" rel="stylesheet" href="./css/dashboard.css">
	<link typye="text/css" rel="stylesheet" href="./css/viewquestions.css">
	<link typye="text/css" rel="stylesheet" href="./css/notification.css">
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

	<p class="left"><a href="sendNotification.php">&lt;back</a></p>
	<div class="heading">
		<h2>Notifications</h2>
	</div>
	<div id="error">
					<?php 
					
						if(isset($_GET['result'])){
							if($_GET['result'] != 'success'){
								echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
							}
							else{
								echo '<div class="alert alert-success" role="alert"><h2>Notification deleted sucessfully!</h2></div>';
							}
							
						}

					?>
				</div>
	<div class="table">
		<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Notification</th>
    </tr>
  </thead>
  <tbody>

<?php 
	$sql = "SELECT * FROM notifications";
	
	$result = mysqli_query($conn,$sql);
	
	if(!$result){
		echo "<h2>There are no notifications at the moment!</h2>";
	}else{
		$i =1;	
		while($row = mysqli_fetch_array($result))
		{
			
		?>
	 <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['notification']?><span class="right"><a class="red confirmation" href="./includes/deleteNotification.php?id=<?php echo $row['Id']?>"><i class="fas fa-trash"></i></span></a></td>
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
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
</html>

<?php
	}else{
		header("Location: ./admin_dashboard.php");
	}
?>