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
		
		



		<tr><td>Ime i Prezime</td>
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
		
		<tr><td>Tip</td>
		<td>
		<select name=\"sifra\">";
  
  $sql_bibl="SELECT * FROM biblioteka";
  $result_bibl=$connection->query($sql_bibl);
		while ($row=$result_bibl->fetch_object()){
			$sifra=$row->sifra;
			$tip=$row->tip;
			
		echo "<option value=\"$sifra\" />$tip</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td>data_od</td><td><input type=\"text\" name=\"data_od\" value=\"\" /></td></tr>
		<tr><td>data_do</td><td><input type=\"text\" name=\"data_do\" value=\"\" /></td></tr>
		<tr><td>kazna</td><td><input type=\"text\" name=\"kazna\" value=\"\" /></td></tr>
		<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"SAVE\" /></td></tr>
		

</table>
</form>

</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>