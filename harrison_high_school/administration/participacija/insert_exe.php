<?php
session_start();

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" participacija ";
$column_name=" prvo_polugodie, vtoro_polugodie ";
$column_value=" '".$_POST['prvo_polugodie']."','".$_POST['vtoro_polugodie']."' ";

//insert records in database table participacija
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT participacija_id FROM participacija WHERE  prvo_polugodie = '".$_POST['prvo_polugodie']."'
								AND		vtoro_polugodie = '".$_POST['vtoro_polugodie']."'";
$particiapcija=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$particiapcija=$row->participacija_id;
}

header("Location:index.php?message=insert&id=".$particiapcija);exit();
?>