<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" natprevari ";
$column_name=" odrzan_na, nagradi ";
$column_value=" '".$_POST['odrzan_na']."','".$_POST['nagradi']."' ";

//insert records in database table natprevari
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT natprevar_id FROM natprevari WHERE  odrzan_na = '".$_POST['odrzan_na']."'
								AND		nagradi = '".$_POST['nagradi']."'";
$particiapcija=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$natprevar=$row->natprevar_id;
}

header("Location:index.php?message=insert&id=".$natprevar);exit();
?>