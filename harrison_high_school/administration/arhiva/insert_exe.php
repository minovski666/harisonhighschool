<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" arhiva ";
$column_name=" sifra, kolicina, predmet_id ";
$column_value=" '".$_POST['sifra']."',".$_POST['kolicina'].",'".$_POST['predmet_id']."' ";

//insert records in database table administracija
$object->insert($table_name,$column_name,$column_value);

header("Location:index.php?message=insert&id=".$_POST['arhiva_id']);exit();
?>