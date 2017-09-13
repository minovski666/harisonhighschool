<?php
session_start();
require_once '../includes/database_connect.php';

if(empty($_SESSION['id']) && strlen($_SESSION['id'])==0 && $_SESSION['id']=="")
{
header("Location:".$settings['website_url']."administration/index.php");
}

$number_of_value=count($_POST['check']);

$array_value=$_POST['check'];
for ($counter=0; $counter<$number_of_value; $counter ++){
	
	$delete=$array_value[$counter];
	
	$sql="DELETE from participacija WHERE participacija_id = \"".$delete."\"";

$connection->query($sql);//execute query
}

header("Location:index.php?message=delete");exit();
?>