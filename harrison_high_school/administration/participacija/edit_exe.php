<?php
session_start();

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" participacija ";
$column_value=" prvo_polugodie='".$_POST['prvo_polugodie']."',
				vtoro_polugodie='".$_POST['vtoro_polugodie']."' ";
$pk=" participacija_id ";
$pk_value=$_POST['participacija_id'];

//update records database with pk_value string
$object->editINT($table_name,$column_value,$pk,$pk_value);


header("Location:index.php?message=update&id=".$_POST['participacija_id']);exit();
?>