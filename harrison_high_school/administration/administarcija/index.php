<?php

session_start();
require_once '../includes/database_connect.php';

if(!isset($_SESSION['id']))
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

<script>
function delete_ad(id){

var deleted=confirm(\"Dali ste sigurni za da brisete\")
if(deleted==true){
window.location.href=\"delete.php?id=\"+id
}else{
return false
}
}
</script>
<link href=\"".$settings['website_url']."administration/css/adminstyle.css\" rel=\"stylesheet\" type=\"text/css\">
<meta name=\"viewport\" content=\"width=device-width\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
<title>".$settings['title']."</title>
</head>
<body>

<div id=\"Header\">

<ul class=\"topnav\" id=\"myTopnav\">";



require_once '../../_prep.php';
echo "

	<li><a href=\"".$settings['website_url']."administration/administarcija/insert.php\">NEW</a></li>
	
		<li><a href=\"index.php?lang=mkd\" >MKD</a></li>
		<li><a href=\"index.php?lang=en\" >EN</a></li>
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
<div id=\"Content\">";
  
$message="";
if(!isset($_GET['id']))$_GET['id']="";
  if(isset($_GET['message']) && $_GET['message']=='insert')$message="Uspesno vnesovte nov zapis";
  if(isset($_GET['message']) && $_GET['message']=='delete')$message="Uspesno izbrisavte zapis";
  if(isset($_GET['message']) && $_GET['message']=='update')$message="Uspesno editiravte zapis";
  
echo $message."
<form action=\"multidelete.php\" method=\"post\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Pozicija</td><td>Ime</td><td>Prezime</td><td>Username</td><td>".$lang_['edit']."</td><td>".$lang_['delete']."</td><td>multidelete</td></tr>";
	
  
  $sql = "select * from administracija";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		$bgcolor="yellow";
		$ime=$row->ime;
		$pozicija=$row->pozicija;
		$prezime=$row->prezime;
		$user=$row->user;
		$pass=$row->passvord;
		$pozicija_print="";
		
		if($pozicija==$_GET['id'])$bgcolor="blue";
		if($pozicija=="d")$pozicija_print="Direktor";
		if($pozicija=="p")$pozicija_print="Profesor";
		if($pozicija=="s")$pozicija_print="Sekretar";
		if($pozicija=="b")$pozicija_print="Blagjnik";
		
		echo	"
		
				<tr bgcolor=$bgcolor>
					<td>$pozicija_print</td><td>$ime</td><td>$prezime</td><td>$user</td>
					<td><a href=\"".$settings['website_url']."administration/administarcija/edit.php?id=$pozicija\"><img src=\"".$settings['website_url']."images/edit.png\" width=20 alt=\"edit\"></a></td>";
					
			if($pozicija!=$_SESSION['id'])echo "<td><a onclick=\"return delete_ad('".$pozicija."')\" ><img src=\"".$settings['website_url']."images/delete.png\" width=20 alt=\"delete\" /></a></td>";
			if($pozicija==$_SESSION['id'])echo "<td></td>";
					
		if($pozicija!=$_SESSION['id'])	echo "<td><input type=\"checkbox\" name=\"check[]\" value=\"$pozicija\" /></td>";
		if($pozicija==$_SESSION['id'])	echo "<td></td>";
					
					
					echo "
				</tr>";
		}
	
		echo "
<tr><td colspan=\"6\"></td><td><input type=\"submit\" name=\"btn\" value=\"DELETE\" /></td></tr>
</table>
</form>

</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>

</body>

</html>
";
?>