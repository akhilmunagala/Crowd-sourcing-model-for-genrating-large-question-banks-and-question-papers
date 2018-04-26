<?php 

if(isset($_POST['adminLecturerView']) || isset($_GET['result']))
{
	session_start();
	include_once "./includes/db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Lecturer - Question Paper Generator</title>
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
		<h2>LIST OF LECTURER'S</h2>
	</div>
  <div class="error">
    <?php 
        if(isset($_GET['result'])){
          if($_GET['result'] != "success"){
            echo '<div class="alert alert-danger" role="alert">'.$_GET["result"].'</div>';
          }
          else{
            echo '<div class="alert alert-success" role="alert">'."Updated Successfully!".'</div>';
            
          }
        }

    ?>

  </div>
	<div class="table">
		<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Gender</th>
      <th scope="col">dob</th>
      <th scope="col">Institute</th>
      <th scope="col">Desgination</th>
      <th scope="col">Specialization</th>
      <th scope="col">Experience</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Status</th>
      <th scope="col">Proof</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php 
	
	$sql = "SELECT * FROM login_details";
	$result = mysqli_query($conn,$sql);
	
	if(!$result){
		echo "<h2>There are no lecturers registered yet!</h2>";
	}else{
		$i =1;	
		while($row = mysqli_fetch_array($result))
		{
			
		?>
	 <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['fname']?></td>
      <td><?php echo $row['lname']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['mnumber']?></td>
      <td><?php echo $row['gender']?></td>
      <td><?php echo $row['dob']?></td>
      <td><?php echo $row['noi']?></td>
      <td><?php echo $row['dsg']?></td>
      <td><?php echo $row['sp']?></td>
      <td><?php echo $row['experience']?></td>
      <td><?php echo $row['state']?></td>
      <td><?php echo $row['city']?></td>
      <td><?php 
      		if($row['status'] == 0){
      			echo "Not Approved";
      		}else{
      			echo "Approved";
      		}
      ?></td>
      <td><a href="<?php echo $row['proof']?>" target="_blank"><img src="<?php echo $row['proof']?>" height="60px" width="60px"></a></td>
      <td>

      	<form name="approve" method="POST" action="./includes/approve.php">

      		<button type="submit" name="approve" value="<?php echo $row['id']?>" class="confirmation <?php
      			if($row['status'] != 0){
      				echo "Block";
      			}else{
      				echo "Approve";
      			}
      		?>">
      		<?php
      			if($row['status'] != 0){
      				echo "Block";
      			}else{
      				echo "Approve";
      			}
      		?>
      		</button>
      	</form>

  </td>
      
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
}
else{
  header("Location: ./admin.php");
  exit();
}

?>  