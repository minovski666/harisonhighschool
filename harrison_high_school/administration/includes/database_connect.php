<?php
require_once 'settings.php';

$connection = new mysqli($server,$username,$password,$dbName);

//$connection = new PDO("mysql:host=".$server.";dbname=".$dbName."", $username, $password);
		
?>