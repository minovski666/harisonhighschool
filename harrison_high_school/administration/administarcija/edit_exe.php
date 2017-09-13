<?php

session_start();


if(empty($_SESSION['id']) && strlen($_SESSION['id'])==0 && $_SESSION['id']=="")
{
header("Location:".$settings['website_url']."administration/index.php");
}
include '../../class/database.php';

$object = new Database();
$table_name=" administracija ";
$column_value=" prezime='".$_POST['prezime']."',
				user='".$_POST['user']."',
				passvord='".sha1($_POST['passvord'])."' ";
$pk=" pozicija ";
$pk_value=$_POST['pozicija'];

//update records database with pk_value string
$object->editSTR($table_name,$column_value,$pk,$pk_value);


/*$sql="UPDATE administracija 
				SET
				prezime='".$_POST['prezime']."',
				user='".$_POST['user']."',
				passvord='".sha1($_POST['passvord'])."'
			WHERE pozicija LIKE \"".$_POST['pozicija']."\"";

$connection->query($sql);//execute query*/

header("Location:index.php?message=update&id=".$_POST['pozicija']);exit();
?>