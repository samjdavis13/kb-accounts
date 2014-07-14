<!DOCTYPE html>
<html>
<head>
	<title>Kirby Account Creator</title>	
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script type="text/javascript">		
		function validateForm() {
			var minimumLength = 5;
			var maxLength = 25;
			var username = document.getElementById('username').value;
			var passcode = document.getElementById("passcode").value;

			// Form validation
			if (username == "" || passcode == "") { //Check all fields are filled
				alert("Error, not all fields are filled out.");
				return false;
			} else if (passcode.length < minimumLength) { // Check password is long enough.
				alert("Error, passcode must be longer than " + minimumLength + " characters.");
				return false;
			} else if (passcode.length > 25){ // Check password is short enough.
				alert("Error, passcode must be " + maxLength + " characters or less.")
				return false;
			} else {
				return true;
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="slab medium">
			<?php if(isset($_GET['error']) && $_GET['error'] === 'passcode') : ?>
				<p class='error'>Incorrect username or password</p>
			<?php endif ?>
			<h1>Login</h1>
			<form name='form' action='login.php' onsubmit="return(validateForm())" method='post'>
				Username:<br>
				<input type='username' name='username' id='username'><br><br>
				Passcode:<br>
				<input type='password' name='passcode' id='passcode'><br><br>
				<input type='submit'>
			</form>
		</div>
	</div>
</body>
</html>