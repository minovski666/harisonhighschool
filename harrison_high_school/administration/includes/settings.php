<?php

$database=parse_ini_file("confi.ini");

//website settings
$settings['title']=$database ['title'];
$settings['website_url']=$database ['website_url'];
$settings['img_url']=$database ['img_url'];
$settings['default_language']=$database ['default_language'];




//database settings
$server=$database['server'];
$username=$database['username'];
$password=$database['password'];
$dbName=$database['dbName'];
?>