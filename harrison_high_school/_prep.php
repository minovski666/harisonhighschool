<?php
//session_start();
require_once 'administration/includes/settings.php';

$path_to_root = '';
while(!file_exists($path_to_root.'reper.php')) $path_to_root .= '../';

//path to root is

if(isSet($_GET['lang'])){
	$language = addslashes($_GET['lang']);
	// register the session and set the cookie
	$_SESSION['lang'] = $language;

		setcookie("lang", $language, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang'])){$language = $_SESSION['lang'];}
else if(isSet($_COOKIE['lang'])){$language = $_COOKIE['lang'];}
else{$language =$settings['default_language'];}

require_once  $path_to_root.'languages/'.$language.'/main_lang.php';
?>