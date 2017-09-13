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
<tr><td>sifra</td><td>
		<select name=\"sifra\">";
  
  $sql_bibl= "SELECT * FROM biblioteka";
  $resault_bibl= $connection->query($sql_bibl);
  while ($row_bibl=$resault_bibl->fetch_object()){
  $sifra=$row_bibl->sifra;
  $tip=$row_bibl->tip;
  
echo "		<option value=\"$sifra\">$tip</option>  ";
		
		
		
		
  }
		
		
		
		
		
		
echo "		</select>
</td></tr>
		
		
		
		
		<tr><td>kolicina</td><td><input type=\"text\" name=\"kolicina\" value=\"\" /></td></tr>
		
		
		
		
		
		
		
		<tr><td>predmet_id</td><td>
		
		
		
		
		<select name=\"predmet_id\">";
		
		$sql_predmet= "SELECT * FROM predmeti";
		$resault_predmet=$connection->query($sql_predmet);
		
		while ($row_predmet=$resault_predmet->fetch_object()){
			$predmet=$row_predmet->predmet_id;
			
			
			
echo "			<option value=\"$predmet\">$predmet</option> ";
		
		
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