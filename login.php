<?php 
ob_start();
session_start();

function createSalt()
{
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
}
$USER = 'maccadmin';
$MASTER_PASS = 'f923cd7cd42afedfa8eeee78e5344da4dbb69c881696e705ee0aa86ca06202ae';
$SALT = createSalt();
$HASHED_MASTER_PASS = hash('sha256',$MASTER_PASS . $SALT);
$passcode = hash('sha256',$_POST['passcode']);
$username = $_POST['username'];

if ( $username != $USER || hash('sha256',$passcode.$SALT) != $HASHED_MASTER_PASS ) { // INCORRECT USER OR PASSWORD
	header('Location: start.php?error=passcode');
} else { // Correct U&P — Redirect to index.php
	session_regenerate_id();
	$_SESSION['sess_user'] = $username;
	session_write_close();
	header('Location: index.php');
}

?>