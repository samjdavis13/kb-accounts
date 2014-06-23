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
</head>
<body>
	<div class="container">
		<?php
			$user = $_POST["name"]; 
			$password = sha1($_POST["password"]);

			// Open a new file
			$filelocation = "accounts/" . $user . ".php";
			$filename = $user . ".php";
			$accountFile = fopen(  $filelocation, "w") or die("Unable to open file!");

			// Write to the file
			$txt = "<?php if(!defined('KIRBY')) exit ?>\n \n";
			fwrite($accountFile, $txt);

			$txt = "# setup your account credentials here\n";
			fwrite($accountFile, $txt);

			$txt = "# it's highly recommended to use md5 or sha1 encryption\n";
			fwrite($accountFile, $txt);

			$txt = "# for your passwords. read more about encryption in the\n";
			fwrite($accountFile, $txt);

			$txt = "# docs: http://getkirby.com/docs/panel/accounts\n";
			fwrite($accountFile, $txt);

			$txt = "\n";
			fwrite($accountFile, $txt);

			$txt = "username: " . $user . "\n";
			fwrite($accountFile, $txt);

			$txt = "password: " . $password. "\n";
			fwrite($accountFile, $txt);

			$txt = "encrypt: sha1 \n";
			fwrite($accountFile, $txt);

			$txt = "language: en";
			fwrite($accountFile, $txt);

			// Close the file
			fclose($accountFile);
			?>

			<?php if (1): ?>

				<div class="container">
					<div class="slab small">
						<h1>Account Created</h1>
						<p>
							<strong>User:</strong> <?php echo $user ?><br>
						</p>
						<p>
							Click to download:
							<a href="<?php echo("download.php?filename=" . $filename) ?>"><?php echo($filename) ?></a>
						</p>
					</div>
				</div>

			<?php else: ?>
				<h1>Error</h1>
				<p>There was an error of some sort.</p>
			<?php  endif ?>
		</div>
</body>
</html>