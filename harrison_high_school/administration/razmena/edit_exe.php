<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" razmena ";
$column_value=" uciliste='".$_POST['uciliste']."' ";
$pk=" grad ";
$pk_value=$_POST['grad'];

//update records database with pk_value string
$object->editSTR($table_name,$column_value,$pk,$pk_value);



header("Location:index.php?message=update&id=".$_POST['grad']);exit();
?>