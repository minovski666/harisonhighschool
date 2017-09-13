<?php

session_start();

if(!isset($_SESSION['id']))
{
header("Location:administration/index.php");
}

include '../../class/database.php';

//inicijalizacija na input polinja
$pozicij="";
$ime="";
$prezime="";
$user="";
$password="";

//validacija na forma START
if(isset($_POST['pozicija']) && strlen($_POST['pozicija'])==1){
	$pozicij=$_POST['pozicija'];
}else{	
	header("Location:insert.php?message_validtion=position");exit();
}
if(isset($_POST['ime']) && strlen($_POST['ime'])>2){
	$ime=$_POST['ime'];
}else{	
	header("Location:insert.php?message_validtion=ime");exit();
}
if(isset($_POST['prezime']) && strlen($_POST['prezime'])>3){
	$prezime=$_POST['prezime'];
}else{	
	header("Location:insert.php?message_validtion=prezime");exit();
}
if(isset($_POST['user']) && strlen($_POST['user'])>4){
	$user=$_POST['user'];
}else{	
	header("Location:insert.php?message_validtion=username");exit();
}
if(isset($_POST['passvord']) && strlen($_POST['passvord'])>4){
	$password=$_POST['passvord'];
}else{	
	header("Location:insert.php?message_validtion=password");exit();
}

//validacija na forma END

$object = new Database();
$table_name=" administracija ";
$column_name=" pozicija, ime, prezime, user, passvord ";
$column_value=" '".$pozicij."','".$ime."','".$prezime."','".$user."','".sha1($password)."' ";

//insert records in database table administracija
$object->insert($table_name,$column_name,$column_value);

header("Location:index.php?message=insert&id=".$_POST['pozicija']);exit();
?>