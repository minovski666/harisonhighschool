<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" plakane ";
$column_name=" embg_u, participacija_id, kazna, popusti ";
$column_value=" '".$_POST['embg_u']."','".$_POST['participacija_id']."','".$_POST['kazna']."','".$_POST['popusti']."' ";

//insert records in database table plakane
$object->insert($table_name,$column_name,$column_value);



$sql1="SELECT plakane_id FROM plakane WHERE  embg_u = '".$_POST['embg_u']."'
								AND		participacija_id = '".$_POST['participacija_id']."'
								AND		kazna = '".$_POST['kazna']."'
								AND		popusti = '".$_POST['popusti']."'";
$plakane=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$plakane=$row->plakane_id;
}

header("Location:index.php?message=insert&id=".$plakane);exit();
?>