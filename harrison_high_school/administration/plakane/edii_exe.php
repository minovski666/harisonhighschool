<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" plakane ";
$column_value=" kazna='".$_POST['kazna']."',
				popusti='".$_POST['popusti']."',
				participacija_id=".$_POST['part']." ";
$pk=" plakane_id ";
$pk_value=$_POST['plakane_id'];

//update records database with pk_value string
$object->editINT($table_name,$column_value,$pk,$pk_value);


header("Location:index.php?message=update&id=".$_POST['plakane_id']);exit();
?>