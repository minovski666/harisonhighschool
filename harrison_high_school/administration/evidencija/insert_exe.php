<?php
session_start();


if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}

include '../../class/database.php';

$object = new Database();
$table_name=" evidencija ";
$column_name=" embg_p, embg_u, oblast, participacija_id, grad, natprevar_id ";
$column_value=" '".$_POST['embg_p']."','".$_POST['embg_u']."','".$_POST['oblast']."','".$_POST['participacija_id']."','".$_POST['grad']."','".$_POST['natprevar_id']."' ";

//insert records in database table evidencija
$object->insert($table_name,$column_name,$column_value);



header("Location:index.php");exit();
?>