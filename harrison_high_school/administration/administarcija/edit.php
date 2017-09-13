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
<img src=\"".$settings['website_url']."administration/img/kniga_logo.jpg\"align=\"top\" id=\"Logo\">
</div>";

//open menu
require_once '../includes/menu_administartion.php'; 

  echo "
</div>
<div id=\"Content\">

<form name=\"myForm\" action=\"edit_exe.php\" method=\"post\" onsubmit=\"return admin()\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Pozicija</td><td>Ime</td><td>Prezime</td><td>Username</td><td>Password</td></tr>";
	
  
  $sql = "select * from administracija where pozicija like \"".$_GET['id']."\"";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		$ime=$row->ime;
		$pozicija=$row->pozicija;
		$prezime=$row->prezime;
		$user=$row->user;
		$pass=$row->passvord;
	
		$pozicija_print="";
		if($pozicija=="d")$pozicija_print="Direktor";
		if($pozicija=="p")$pozicija_print="Profesor";
		if($pozicija=="s")$pozicija_print="Sekretar";
		if($pozicija=="b")$pozicija_print="Blagjnik";
		
		echo	"
		
				<tr>
					<td><input type=\"hidden\" name=\"pozicija\" value=\"$pozicija\" />$pozicija_print</td>
					<td>$ime</td><td><input type=\"text\" name=\"prezime\" value=\"$prezime\" /></td>
					<td><input type=\"text\" name=\"user\" value=\"$user\" /></td>
					<td><input type=\"password\" name=\"passvord\" value=\"$pass\" /></td>
				</tr>";
		}
	
		echo "
<tr><td><input type=\"submit\" name=\"submit\" value=\"EDIT\" /></td></tr>
</table>
</form>
</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>
<script src=\"".$settings['website_url']."administration/js/validationAdministracija.js\"></script>
</html>";
?>