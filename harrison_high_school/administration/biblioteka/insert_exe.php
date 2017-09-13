<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" biblioteka ";
$column_name=" sifra, tip ";
$column_value=" '".$_POST['sifra']."','".$_POST['tip']."' ";

//insert records in database table biblioteka
$object->insert($table_name,$column_name,$column_value);

header("Location:index.php?message=insert&id=".$_POST['sifra']);exit();
?>