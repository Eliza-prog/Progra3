<?php
session_start();
$username = $_POST['name'];
$password = md5($_POST['pwd']);
$mysqli=mysqli_connect("localhost", "root", "bases1", "progra3");

$query = "SELECT * FROM persona WHERE Usuario='$username' AND Contrasena='$password'";
$result = mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row >=1 ) {
			echo 'true';
			$_SESSION['user_name']=$row['username'];
		}
		else{
			echo 'false';
		}
?>