<?php 
function forceDownLoad($filename) { 
	header("Pragma: public"); 
	header("Expires: 0"); // set expiration time 
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	header("Content-Type: application/force-download"); 
	header("Content-Type: application/octet-stream"); 
	header("Content-Type: application/download"); 
	header("Content-Disposition: attachment; filename=".basename($filename).";"); 
	header("Content-Transfer-Encoding: binary"); 
	header("Content-Length: ".filesize($filename)); 
	@readfile($filename); 
	exit(0); 
} 

//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user']) || (trim($_SESSION['sess_user']) == '')) {
	header("location: start.php");
	exit();
}

$filename = $_GET['filename'];
$directory = $_SESSION['user_directory'];
$safesearch = false;

// Remove anything that moves the file directory.
while(!$safesearch) {
	if (strpos($filename, "/") === FALSE) {
		// '/' Not found
		$safesearch = true;
	}
	else {
		// '/' Found (Destroy String)
		$filename = hash('sha256',$filename);
	}
}

$filelocation = "$directory$filename";

// Make sure file exists before trying to download
if (file_exists($filelocation)) {
	forceDownLoad($filelocation);
}
else {
	echo "That file doesn't exist.";
}


?>