<?php
session_start();

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" sekcii ";
$column_name=" oblast, nedelno ";
$column_value=" '".$_POST['oblast']."','".$_POST['nedelno']."' ";

//insert records in database table sekcii
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT oblast FROM sekcii WHERE  oblast = '".$_POST['oblast']."'
								AND		nedelno = '".$_POST['nedelno']."'";

$oblast=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$oblast=$row->oblast;
}


header("Location:index.php?message=insert&id=".$oblast);exit();
?>