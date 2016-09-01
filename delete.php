<?php
require_once 'includes/db.php';

$error='';
if( isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql = "DELETE FROM userdetails WHERE id = $id";
	$result = $db->query($sql);
}
	header('Location: index.php');
	exit;