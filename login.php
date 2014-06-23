<?php 
ob_start();
session_start();

function createSalt()
{
    $text = md5(uniqid(rand(), true));
    return substr($text, 0, 3);
}

$MASTER_PASS = '9981b28abf766d92c3761fe28a1e3f7732310b45e75f5b349b5082e8c78f0676';
$SALT = createSalt();
$hashed_salted_pass = hash('sha256',$MASTER_PASS . $SALT);
$passcode = hash('sha256',$_POST['passcode']);

if ( hash('sha256',$passcode.$SALT) != $hashed_salted_pass ) { // INCORRECT PASSWORD
	header('Location: start.php?error=passcode');
} else { // Redirect to index.php
	session_regenerate_id();
	$_SESSION['sess_user'] = 'Admin';
	session_write_close();
	header('Location: index.php');
}

?>