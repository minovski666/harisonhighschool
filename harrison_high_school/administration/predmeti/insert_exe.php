<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" predmeti ";
$column_name=" predmet_id, zadolzitelen, izboren ";
$column_value=" '".$_POST['predmet_id']."','".$_POST['zadolzitelen']."','".$_POST['izboren']."' ";

//insert records in database table predmeti
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT predmet_id FROM predmeti WHERE  predmet_id = '".$_POST['predmet_id']."'
								AND		zadolzitelen = '".$_POST['zadolzitelen']."'
								AND		izboren = '".$_POST['izboren']."'";
$predmet=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$predmet=$row->predmet_id;
}

header("Location:index.php?message=insert&id=".$predmet);exit();
?>