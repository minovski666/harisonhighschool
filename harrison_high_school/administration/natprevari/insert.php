<?php
session_start();
require_once '../includes/database_connect.php';

if(!isset($_SESSION['id']))
{
header("Location:".$settings['website_url']."administration/index.php");
}
require_once '../includes/settings.php';
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

  echo "
  

  
</div>
<div id=\"Content\">

<form name=\"myForm\" action=\"insert_exe.php\" method=\"post\" onsubmit=\"return natprevar()\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
		
		
		<tr><td>odrzan_na</td><td><input type=\"text\" name=\"odrzan_na\" value=\"\" /></td></tr>
		<tr><td>nagradi</td><td><input type=\"text\" name=\"nagradi\" value=\"\" /></td></tr>
		
		<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"SAVE\" /></td></tr>
		

</table>
</form>

</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>
<script src=\"".$settings['website_url']."administration/js/validationNatprevari.js\"></script>
</html>
";
?>