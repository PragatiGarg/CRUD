<?php
	$message = ' ';
	$host = 'localhost';
	$user = 'pragati';
	$password = '';
	$databasename = 'userprofile';
	$db = new MySQLi($host, $user, $pass, $databasename);
	if($db->connect_error)
		$message = $db->connect_error;
	else
		$message = 'Connection is OK';

	$db->exec('SET CHARACTER SET utf8');
	if($db->error)
		$message = $db->error;
?>