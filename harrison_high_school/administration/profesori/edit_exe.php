<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" profesori ";
$column_value=" prezimeP='".$_POST['prezimeP']."',
				staz='".$_POST['staz']."' ";
$pk=" embg_p ";
$pk_value=$_POST['embg_p'];

//update records database with pk_value string
$object->editSTR($table_name,$column_value,$pk,$pk_value);


header("Location:index.php?message=update&id=".$_POST['embg_p']);exit();
?>