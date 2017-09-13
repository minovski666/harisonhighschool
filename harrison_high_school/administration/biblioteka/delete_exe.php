<?php
session_start();
require_once '../includes/database_connect.php';

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
include '../../class/database.php';

$object = new Database();
$table_name="biblioteka";
$pk="sifra";
$pk_value=$_GET['id'];

//delete records from database with pk_value string
$object->deleteSTR($table_name,$pk,$pk_value);

header("Location:index.php?message=delete");exit();
?>