<?php
session_start();
if (isset($_SESSION['sess_user'])) {
	unset($_SESSION['sess_user']);
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
		window.onload = function () {
			var seconds = document.getElementById('seconds');
			var secLeft = 3;
			seconds.firstChild.nodeValue = secLeft;
			var t = setInterval(countdown, 1000);
			function countdown() {
				secLeft--;
				seconds.firstChild.nodeValue = secLeft;
				if (secLeft <= 0) {
					window.location.href = "index.php";
				}				
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="slab extrasmall">
			<h1>Succesfully Logged Out</h1>		
			<p>Returning home in <span id='seconds'>*</span> seconds</p>
		</div>
	</div>
</body>
</html>