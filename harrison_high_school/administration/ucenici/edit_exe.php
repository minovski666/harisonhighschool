<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" ucenici ";
$column_value=" klas='".$_POST['klas']."',
				oddelenie='".$_POST['oddelenie']."' ";
$pk=" embg_u ";
$pk_value=$_POST['embg_u'];

//update records database with pk_value string
$object->editSTR($table_name,$column_value,$pk,$pk_value);


header("Location:index.php?message=update&id=".$_POST['embg_u']);exit();
?>