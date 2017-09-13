<?php
session_start();
require_once '../administration/includes/settings.php';
session_destroy();
unset($_SESSION['id']);
header("Location:".$settings['website_url']."administration/index.php");
?>