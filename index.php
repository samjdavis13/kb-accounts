<?php
//Start session
session_start();
 
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user']) || (trim($_SESSION['sess_user']) == '')) {
	header("location: start.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kirby Account Creator</title>	
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script type="text/javascript">		
		function validateForm() {
			var user = document.getElementById("user").value;
			var pass1 = document.getElementById("password").value;
			var pass2 = document.getElementById("password2").value;

			var valid = false;
			var errors = "";

			// Check all fields are filled out.
			if (user =="" || pass1 == "" || pass2 == "") {
				alert("You must fill out all fields");
				return false;
			} // Check passwords match
			else if (pass1 != pass2) {
				alert("The passwords do not match!");
				return false;
			}
			else {
				return true;
			}

		}
	</script>
</head>
<body>
	<div class="container">
		<div class="slab">
			<h1>Kirby Account Creator</h1>
			<?php if(isset($_GET['password']) && $_GET['password'] === 'reset') : ?>
				<p class='error'>Enter old username with a new password to reset.</p>
				<form name='form' action='create.php?password=changed' onsubmit="return(validateForm())" method='post'>
			<?php else : ?>
				<form name='form' action='create.php' onsubmit="return(validateForm())" method='post'>
			<?php endif ?>
				Username: <br><input type='name' name='name' id='user'><br>
				<br>Password: <br><input type='password' name='password' id='password'><br>
				<br>Password Again: <br><input type='password' name='password2' id='password2'><br><br>
				<input type='submit'>
			</form>
			<br>	
			<form name='logout-form' action='logout.php' method="post">
				<input type='submit' id='login' value='Logout'>
				<?php if( !isset($_GET['password']) && $_GET['password'] !== 'reset') : ?>
					<br><br><a href="?password=reset"><span>Forgotten Password?</span></a>
				<?php endif ?>
				
			</form>
		</div>
	</div>
</body>
</html>