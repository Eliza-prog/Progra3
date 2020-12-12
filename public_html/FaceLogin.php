<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
<script type="text/javascript" src="js/FuntionLogin.js"></script>
<title>Popup Login</title>

</head>
<body>
<?php session_start(); ?>
	<div id="profile">
    	<?php if(isset($_SESSION['user_name'])){
			?>
			<a href='logout.php' id='logout'>Logout</a>
		<?php }else {?>
		<a id="login_a" href="#">login</a>
        <?php } ?>
	</div>
    <div id="login_form">
        <div class="err" id="add_err"></div>
    	<form action="login.php">
			<label>User Name:</label>
			<input type="text" id="user_name" name="user_name" />
			<label>Password:</label>
			<input type="password" id="password" name="password" />
			<label></label><br/>
			<input type="submit" id="login" value="Login" />
			<input type="button" id="cancel_hide" value="Cancel" />
		</form>
    </div>
	<div id="shadow" class="popup"></div>
</body>
</html>