<?php
session_start();
require_once '../includes/database_connect.php';

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

$number_of_value=count($_POST['check']);

$array_value=$_POST['check'];
for ($counter=0; $counter<$number_of_value; $counter ++){
	
	$delete=$array_value[$counter];
	
	$sql="DELETE from sekcii WHERE oblast LIKE \"".$delete."\"";

$connection->query($sql);//execute query
}

header("Location:index.php?message=delete");exit();
?>