<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" rezervacija ";
$column_value=" data_od='".$_POST['data_od']."',
				data_do='".$_POST['data_do']."',
				kazna='".$_POST['kazna']."' ";
$pk=" rezervacija_id ";
$pk_value=$_POST['rezervacija_id'];

//update records database with pk_value string
$object->editINT($table_name,$column_value,$pk,$pk_value);

header("Location:index.php?message=update&id=".$_POST['rezervacija_id']);exit();
?>