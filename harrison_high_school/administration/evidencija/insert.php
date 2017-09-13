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

		
		
		<tr><td>Ime i Prezime na profesorot</td>
		<td>
		<select name=\"embg_p\">";
  
  $sql_profe="SELECT * FROM profesori";
  $result_profe=$connection->query($sql_profe);
		while ($row=$result_profe->fetch_object()){
			$ime=$row->imeP;
			$prezime=$row->prezimeP;
			$embg=$row->embg_p;
		echo "<option value=\"$embg\" />$ime - $prezime</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td>Ime i Prezime na ucenikot</td>
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

		
		<tr><td>Oblast</td>
		<td>
		<select name=\"oblast\">";
  
  $sql_sekcii="SELECT * FROM sekcii";
  $result_sekcii=$connection->query($sql_sekcii);
		while ($row=$result_sekcii->fetch_object()){
			$oblast=$row->oblast;
		
		echo "<option value=\"$oblast\" />$oblast</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td>Godisna participacija</td>
		<td>
		<select name=\"participacija_id\">";
  
  $sql_part="SELECT * FROM participacija";
  $result_part=$connection->query($sql_part);
		while ($row=$result_part->fetch_object()){
			$part=$row->participacija_id;
			$prvo=$row->prvo_polugodie;
			$vtoro=$row->vtoro_polugodie;
		echo "<option value=\"$part\" />$prvo + $vtoro</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td>Grad i drzava</td>
		<td>
		<select name=\"grad\">";
  
  $sql_razmena="SELECT * FROM razmena";
  $result_razmena=$connection->query($sql_razmena);
		while ($row=$result_razmena->fetch_object()){
			$grad=$row->grad;
			$drzava=$row->drzava;
		
		echo "<option value=\"$grad\" />$grad, $drzava</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td>Dobieni nagradi od natprevari</td>
		<td>
		<select name=\"natprevar_id\">";
  
  $sql_nat="SELECT * FROM natprevari";
  $result_nat=$connection->query($sql_nat);
		while ($row=$result_nat->fetch_object()){
			$natprevar=$row->natprevar_id;
			$nagrada=$row->nagradi;
		
		echo "<option value=\"$natprevar\" />$nagrada</option>";
		}
		
		echo "
		</select>
		</td></tr>
		
		
		<tr><td></td><td><input type=\"submit\" name=\"submit\" value=\"SAVE\" /></td></tr>

</table>
</form>

</div>


<div id=\"Footer\"> Marko MINOVSKI  </div>


</body>

</html>
";
?>