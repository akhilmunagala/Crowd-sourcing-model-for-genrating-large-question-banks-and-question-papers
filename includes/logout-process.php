<?php

if (isset($_POST['submit'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}

session_start();

if (isset($_SESSION['a_id'])) {

	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}

?>