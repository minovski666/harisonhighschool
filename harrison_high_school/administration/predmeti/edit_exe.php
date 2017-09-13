<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" predmeti ";
$column_value=" zadolzitelen='".$_POST['zadolzitelen']."',
				izboren='".$_POST['izboren']."' ";
$pk=" predmet_id ";
$pk_value=$_POST['predmet_id'];

//update records database with pk_value string
$object->editSTR($table_name,$column_value,$pk,$pk_value);


header("Location:index.php?message=update&id=".$_POST['predmet_id']);exit();
?>