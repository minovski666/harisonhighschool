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
window.location.href=\"delete_exe.php?id=\"+id
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

<ul class=\"topnav\" id=\"myTopnav\">
	<li><a href=\"".$settings['website_url']."administration/predmeti/insert.php\">NEW</a></li> 
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
<div id=\"Content\">";
  
$message="";
if(!isset($_GET['id']))$_GET['id']="";
  if(isset($_GET['message']) && $_GET['message']=='insert')$message="Uspesno vnesovte nov zapis";
  if(isset($_GET['message']) && $_GET['message']=='delete')$message="Uspesno izbrisavte zapis";
  if(isset($_GET['message']) && $_GET['message']=='update')$message="Uspesno editiravte zapis";
  
echo $message."
<form action=\"multidelete.php\" method=\"post\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
<tr><td>Predmet</td><td>Zadolzitelen</td><td>Izboren</td><td>edit</td><td>delete</td><td>multidelete</td></tr>";	
  
  $sql = "select * from predmeti";
	$result=	$connection->query($sql);	
	while ($row=$result->fetch_object()){
		$predmet=$row->predmet_id;
		$zadolzitelen=$row->zadolzitelen;
		$izboren=$row->izboren;
		$bgcolor="yellow";
		
		if($predmet==$_GET['id'])$bgcolor="blue";
		
	
		echo	"<tr bgcolor=$bgcolor>
					<td>$predmet</td><td>$zadolzitelen</td><td>$izboren</td>
					<td><a href=\"".$settings['website_url']."administration/predmeti/edit.php?id=$predmet\"><img src=\"".$settings['website_url']."images/edit.png\" width=20 alt=\"edit\"></a></td>
					<td><a onclick=\"return delete_ad('".$predmet."')\" ><img src=\"".$settings['website_url']."images/delete.png\" width=20 alt=\"delete\"></a></td>
					<td><input type=\"checkbox\" name=\"check[]\" value=\"$predmet\" /></td>
				</tr>";
		}
	
		echo "
<tr><td colspan=\"5\"></td><td><input type=\"submit\" name=\"btn\" value=\"DELETE\" /></td></tr>
</table>
</form>
</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>