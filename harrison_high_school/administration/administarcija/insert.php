<?php

session_start();
require_once '../includes/database_connect.php';

if(empty($_SESSION['id']) && strlen($_SESSION['id'])==0 && $_SESSION['id']=="")
{
header("Location:".$settings['website_url']."administration/index.php");
}
echo 
"
<!DOCTYPE html PUBLIC>
<html>
<head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100%;
    background-color: #f1f1f1;
    
    font-size: large;

}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #838783;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>

<link href=\"".$settings['website_url']."administration/css/adminstyle.css\" rel=\"stylesheet\" type=\"text/css\">
<meta name=\"viewport\" content=\"width=device-width\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<title>".$settings['title']."</title>
</head>
<body>

<div id=\"Header\">

<ul class=\"topnav\" id=\"myTopnav\">
   
</ul>





</div>
<div id=\"Left\" >
<div>
<img src=\"img/kniga_logo.jpg\"align=\"top\" id=\"Logo\">
</div>
";

//open menu
require_once '../includes/menu_administartion.php'; 

$messge="";
if(isset($_GET['message_validtion']) && $_GET['message_validtion']=="position")$messge=" Odbeerete Pozicija";
if(isset($_GET['message_validtion']) && $_GET['message_validtion']=="ime")$messge="Vnesete ime so najmalku 3 karakteri";
if(isset($_GET['message_validtion']) && $_GET['message_validtion']=="prezime")$messge="Vnesete prezime so najmalku 4 karakteri";
if(isset($_GET['message_validtion']) && $_GET['message_validtion']=="username")$messge="Vnesete username so najmalku 4 karakteri";
if(isset($_GET['message_validtion']) && $_GET['message_validtion']=="password")$messge="Vnesete password so najmalku 4 karakteri";
  echo "
  

  
</div>
<div id=\"Content\">".$messge."

<form action=\"insert_exe.php\" method=\"post\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
		
		<tr><td>pozicija</td><td>

		<select name=\"pozicija\">
			<option value=\"d\">Direktor</option>
			<option value=\"p\">Profesor</option>
			<option value=\"s\">Sekretar</option>
			<option value=\"b\">Blagajnik</option>
		</select>
		
		</td></tr>
		<tr><td>ime</td><td><input type=\"text\" name=\"ime\" value=\"\" /></td></tr>
		<tr><td>prezime</td><td><input type=\"text\" name=\"prezime\" value=\"\" /></td></tr>
		<tr><td>user</td><td><input type=\"text\" name=\"user\" value=\"\" /></td></tr>
		<tr><td>passvord</td><td><input type=\"password\" name=\"passvord\" value=\"\" /></td></tr>
		<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"SAVE\" /></td></tr>
		

</table>
</form>
</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>
</html>
";
?>
<!-- <script src="../../administration/js/validationAdministracija.js"></script> -->