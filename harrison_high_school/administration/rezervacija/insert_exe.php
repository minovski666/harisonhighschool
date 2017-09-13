<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/database_connect.php';
include '../../class/database.php';

$object = new Database();
$table_name=" rezervacija ";
$column_name=" embg_u, sifra, data_od, data_do, kazna ";
$column_value=" '".$_POST['embg_u']."','".$_POST['sifra']."','".$_POST['data_od']."','".$_POST['data_do']."','".$_POST['kazna']."' ";

//insert records in database table rezervacija
$object->insert($table_name,$column_name,$column_value);


$sql1="SELECT rezervacija_id FROM rezervacija WHERE  embg_u = '".$_POST['embg_u']."'
								AND		sifra = '".$_POST['sifra']."'
								AND		data_od = '".$_POST['data_od']."'
								AND		data_do = '".$_POST['data_do']."'
								AND		kazna = '".$_POST['kazna']."'";

$rezervacija=0;
$result=$connection->query($sql1);//execute query
while ($row=$result->fetch_object()){
	
	$rezervacija=$row->rezervacija_id;
}


header("Location:index.php?message=insert&id=".$rezervacija);exit();
?>