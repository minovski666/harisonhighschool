<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
include '../../class/database.php';

$object = new Database();
$table_name=" arhiva ";
$column_value=" kolicina ='".$_POST['kolicina']."' ";
$pk=" arhiva_id ";
$pk_value=$_POST['arhiva_id'];

//update records database with pk_value string
$object->editINT($table_name,$column_value,$pk,$pk_value);



header("Location:index.php?message=update&id=".$_POST['arhiva_id']);exit();
?>