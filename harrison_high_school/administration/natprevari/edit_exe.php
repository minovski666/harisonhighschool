<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" natprevari ";
$column_value=" odrzan_na='".$_POST['odrzan_na']."',
				nagradi='".$_POST['nagradi']."' ";
$pk=" natprevar_id ";
$pk_value=$_POST['natprevar_id'];

//update records database with pk_value string
$object->editINT($table_name,$column_value,$pk,$pk_value);



header("Location:index.php?message=update&id=".$_POST['natprevar_id']);exit();
?>