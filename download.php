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

$filename = $_GET['filename'];
$safesearch = false;

// Remove anything that moves the file location up a directory.
while(!$safesearch) {
	if (strpos($filename, "../") === FALSE) {
		// '../' Not found
		$safesearch = true;
	}
	else {
		// '../' Found (Destroy String)
		$filename = md5($filename);
	}
}

// Append actual file location
$fileLocation = "accounts/" . $filename;

// Make sure file exists before trying to download
if (file_exists($fileLocation)) {
	forceDownLoad($fileLocation);
}
else {
	echo "That file doesn't exist.";
}


?>