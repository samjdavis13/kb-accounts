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
			var passcode = document.getElementById("passcode").value;
			var valid = false;

			// Check it is long enough.
			if (passcode.length < minimumLength) {
				alert("Error, passcode must be longer than " + minimumLength + " characters.");
				return false;
			} else if (passcode.length > 25){
				alert("Error, passcode must be " + maxLength + " characters or less.")
			}
			else {
				return true;
			}

		}
	</script>
</head>
<body>
	<div class="container">
		<div class="slab small">
			<?php if(isset($_GET['error']) && $_GET['error'] === 'passcode') : ?>
				<p class='error'>Incorrect password</p>
			<?php endif ?>
			<h1>Login</h1>
			<form name='form' action='login.php' onsubmit="return(validateForm())" method='post'>
				Passcode:<br><br>
				<input type='password' name='passcode' id='passcode'><br><br>
				<input type='submit'>
			</form>
		</div>
	</div>
</body>
</html>