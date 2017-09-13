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

<form name=\"myForm\" action=\"insert_exe.php\" method=\"post\" onsubmit=\"return admin()\">
<table border=\"1\" style=\"border: black\" align=\"center\"  width=\"100%\">
		
		
		<tr><td>embg_u</td>
		<td>
		<select name=\"embg_u\">";
  
  $sql="SELECT * FROM ucenici";
  $result=$connection->query($sql);
		while ($row=$result->fetch_object()){
			$ime=$row->imeU;
			$prezime=$row->PrezimeU;
			$embg=$row->embg_u;
		echo "<option value=\"$embg\" />$ime - $prezime</option>";
		}
		
		echo "
		</select>
		</td></tr>
		<tr><td>participacija_id</td>
		<td>
				<select name=\"participacija_id\">";
		
  $sql="SELECT * FROM participacija";
  $result=$connection->query($sql);
		while ($row=$result->fetch_object()){
			$participacija=$row->participacija_id;
			$prvo=$row->prvo_polugodie;
			$vtoro=$row->vtoro_polugodie;
		echo "<option value=\"$participacija\" />$prvo - $vtoro</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		<tr><td>kazna</td><td><input type=\"text\" name=\"kazna\" value=\"\" /></td></tr>
		<tr><td>popusti</td><td><input type=\"text\" name=\"popusti\" value=\"\" /></td></tr>
		<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"SAVE\" /></td></tr>
		

</table>
</form>


</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>