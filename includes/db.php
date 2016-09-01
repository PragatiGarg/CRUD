<?php
	$message = ' ';
	$host = 'localhost';
	$user = 'pragati';
	$pass = '';
	$databasename = 'userprofile';
	$db = new MySQLi($host, $user, $pass, $databasename);
	if($db->connect_error)
		$message = $db->connect_error;
	else
		$message = 'Connection is OK';
?>